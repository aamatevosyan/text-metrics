<?php

namespace Domain\DocumentProcessing\Processors\Pdf;

use App\Enums\DocumentElementType;
use App\Models\Document;
use Arr;
use Domain\DocumentProcessing\Processors\AbstractDocumentProcessor;
use JetBrains\PhpStorm\ArrayShape;
use Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\TemporaryDirectory;
use Storage;
use Str;
use Symfony\Component\Process\Process;
use Zip;

class BasicPdfPhpProcessor extends AbstractDocumentProcessor
{
    public const PRIORITY_UNDEFINED = 100;

    public function getExcludedElements(): array
    {
        return [
            'Aside',
            'Figure',
            'Footnote',
            'Lbl',
            'Reference',
            'StyleSpan',
            'Sub',
            'Table',
            'TD',
            'TH',
            'TR',
            'Title',
            'TOC',
            'TOCI',
            'Watermark',
        ];
    }

    public function getExcludedPages(): array
    {
        return Arr::get($this->config, 'excluded_pages', []);
    }

    public function getSupportedElements(): array
    {
        return [
            'Sect',
            'H1',
            'H2',
            'H3',
            'H4',
            'H5',
            'H6',
            'P',
            'ParagraphSpan',
            'L',
            'Li',
            'LBody',
        ];
    }

    public function getDocumentElementType(array $item): DocumentElementType
    {
        $priority = $this->getElementPriority($item);

        if ($priority >= 0 && $priority <= 6) {
            return DocumentElementType::Heading;
        }

        if ($priority >= 7 && $priority <= 8) {
            return DocumentElementType::Paragraph;
        }

        if ($priority >= 9 && $priority <= 11) {
            return DocumentElementType::ListItem;
        }

        return DocumentElementType::Undefined;
    }

    public function getElementPriority(array $item): int
    {
        $path = $item['Path'];

        foreach ($this->getSupportedElements() as $priority => $key) {
            if (Str::contains($path, $key)) {
                return $priority;
            }
        }

        return self::PRIORITY_UNDEFINED;
    }

    #[ArrayShape(['element_type' => "string", 'page' => "mixed|null", 'text' => "mixed|null"])] public function
    transformResults(
        array &$results
    ): void {
        foreach ($results as &$item) {
            $new = [
                'element_type' => $this->getDocumentElementType($item)->value,
                'page' => $item['Page'] ?? null,
                'text' => $item['Text'] ?? null,
            ];

            if (isset($item['children'])) {
                $this->transformResults($item['children']);
                $new['children'] = $item['children'];
            }

            $item = $new;
        }
    }

    public function prepareResults(array &$item, array &$results): void
    {
        $priority = $this->getElementPriority($item);

        for ($i = count($results) - 1; $i >= 0; $i--) {
            $resultPriority = $this->getElementPriority($results[$i]);

            if ($resultPriority <= $priority) {
                if ($resultPriority === $priority) {
                    $results[] = $item;
                    return;
                }

                if (!isset($results[$i]['children'])) {
                    $results[$i]['children'] = [$item];
                    return;
                }

                $this->prepareResults($item, $results[$i]['children']);
                return;
            }
        }

        $results[] = $item;
    }

    public function getDocument(Media $media, string $filePath): Document
    {
        if (!Storage::disk('local')->exists("document-processing/{$media->custom_properties['hash']}.json")) {
            $temporaryDirectory = TemporaryDirectory::create();

            $temporaryFile = $temporaryDirectory->path('/').DIRECTORY_SEPARATOR.'response.zip';

            $process = Process::fromShellCommandline(
                "node src/extractpdf/extract-text-info-from-pdf.js --input={$filePath} --output={$temporaryFile}",
                base_path('modules/pdfservices-node-sdk'),
            );
            $process->setTimeout(600);

            $process->mustRun();

            Log::debug('Processing PDF document using Adobe API:\n'.$process->getOutput());

            $zip = Zip::open($temporaryFile);
            $zip->extract($temporaryDirectory->path());

            $jsonName = $temporaryDirectory->path('/structuredData.json');
            $contents = file_get_contents($jsonName);

            Storage::disk('local')->put("document-processing/{$media->custom_properties['hash']}.json", $contents);
            $temporaryDirectory->delete();
        }

        $contents = Storage::disk('local')->get("document-processing/{$media->custom_properties['hash']}.json");

        $data = json_decode($contents, true);
        $elements = collect($data['elements'])
            ->filter(function (array $item) {
                return !Str::contains($item['Path'], $this->getExcludedElements())
                    && (!isset($item['Page']) ||
                        !in_array($item['Page'], $this->getExcludedPages(), true)
                    );
            });

        $results = [];

        $elements->each(function (array $item) use (&$results) {
            $this->prepareResults($item, $results);
        });

        $this->transformResults($results);

        return Document::create([
            'media_id' => $media->id,
            'content' => $results,
        ]);
    }
}
