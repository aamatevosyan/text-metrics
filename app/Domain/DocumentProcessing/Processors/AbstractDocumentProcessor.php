<?php

namespace Domain\DocumentProcessing\Processors;

use App\Models\Document;
use Arr;
use Cache;
use Spatie\MediaLibrary\MediaCollections\Filesystem;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\TemporaryDirectory;

abstract class AbstractDocumentProcessor
{
    public function __construct(protected array $config = [])
    {
    }

    public static function fromSlug(string $slug, array $config = []): static
    {
        $className = config("document-processing.processors.{$slug}.handler");
        $baseConfig = config("document-processing.processors.{$slug}.config");

        return new $className(array_merge($baseConfig ?? [], $config));
    }

    abstract public function getDocument(Media $media, string $filePath): Document;

    public function process(Media $media): void
    {
        if (!Arr::get($this->config, 'enabled') || Cache::driver('array')->get('document-processing.disabled')) {
            return;
        }

        $temporaryDirectory = TemporaryDirectory::create();

        $temporaryFile = $temporaryDirectory->path('/').DIRECTORY_SEPARATOR.$media->file_name;

        /** @var \Spatie\MediaLibrary\MediaCollections\Filesystem $filesystem */
        $filesystem = app(Filesystem::class);

        $filesystem->copyFromMediaLibrary($media, $temporaryFile);

        $this->getDocument($media, $temporaryFile);

        $temporaryDirectory->delete();
    }
}
