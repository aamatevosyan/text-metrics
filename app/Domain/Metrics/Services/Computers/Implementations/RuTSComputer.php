<?php

namespace Domain\Metrics\Services\Computers\Implementations;

use Domain\Metrics\Services\Computers\Core\TextFileBasedTextMetricComputer;
use Symfony\Component\Process\Process;

class RuTSComputer extends TextFileBasedTextMetricComputer
{
    public function processUsingFiles(string $inputTextFilePath, string $outputFilePath): void
    {
        $process = Process::fromShellCommandline(
            "python3 run.py $inputTextFilePath $outputFilePath",
            base_path('modules/ruTS'),
        );

        $process->setTimeout(600);
        $process->mustRun();
    }

    public function isProcessingParagraphs(): bool
    {
        return true;
    }
}
