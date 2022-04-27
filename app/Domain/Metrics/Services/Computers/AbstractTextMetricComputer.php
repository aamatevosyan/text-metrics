<?php

namespace Domain\Metrics\Services\Computers;

use App\Models\Document;
use Domain\Metrics\Models\TextMetricComputer;
use Spatie\TemporaryDirectory\TemporaryDirectory;


abstract class AbstractTextMetricComputer
{
    protected TemporaryDirectory $temporaryDirectory;

    public function __construct(protected array $config = [])
    {
        $this->temporaryDirectory = \Spatie\MediaLibrary\Support\TemporaryDirectory::create();
    }

    public static function fromModel(TextMetricComputer $model): static
    {
        return new $model->class($model->config);
    }

    public function getTextPath(string $text, string $uuid): string
    {
        $path = $this->temporaryDirectory->path($uuid.'-input.txt');
        file_put_contents($path, $text);

        return $path;
    }

    public function getComputerResultsPath(string $uuid): string
    {
        return $this->temporaryDirectory->path($uuid.'-output.json');
    }

    public function getComputerResults(string $uuid): array
    {
        return json_decode(
            file_get_contents($this->getComputerResultsPath($uuid)),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    abstract public function process(string $inputFilePath, string $outputFilePath): void;

    public function computeDocumentMetrics(Document $document): array
    {

    }

    public function compute(Document $document): array
    {
        $this->process(
            $this->getTextPath($document->getParagraphsText(), $document->uuid),
            $this->getComputerResultsPath($document->uuid)
        );

        $documentResult = $this->getComputerResults($document->uuid);
        $paragraphResults = [];

        foreach ($document->getParagraphs() as $uuid => $text) {
            $this->process(
                $this->getTextPath($text, $uuid),
                $this->getComputerResultsPath($uuid)
            );

            $paragraphResults[$uuid] = $this->getComputerResults($uuid);
        }

        return compact('documentResult', 'paragraphResults');
    }
}
