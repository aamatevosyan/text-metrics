<?php

namespace Domain\Metrics\Services\Computers\Core;

use Spatie\TemporaryDirectory\TemporaryDirectory;
use Str;

abstract class TextFileBasedTextMetricComputer extends TextBasedTextMetricComputer
{
    protected TemporaryDirectory $temporaryDirectory;

    public function __construct(protected array $config = [])
    {
        $this->temporaryDirectory = \Spatie\MediaLibrary\Support\TemporaryDirectory::create();
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

    public function processUsingFiles(string $inputTextFilePath, string $outputFilePath): void
    {
    }

    public function process(string $inputText): array
    {
        $uuid = Str::orderedUuid()->toString();

        $inputTextFilePath = $this->getTextPath($inputText, $uuid);
        $outputFilePath = $this->getComputerResultsPath($uuid);

        $this->processUsingFiles($inputTextFilePath, $outputFilePath);

        return $this->getComputerResults($uuid);
    }
}
