<?php

namespace Domain\Metrics\Services\Computers;

use Symfony\Component\Process\Process;

class RuTSComputer extends AbstractTextMetricComputer
{
    public function process(string $inputFilePath, string $outputFilePath): void
    {
        $process = Process::fromShellCommandline(
            "python3 run.py $inputFilePath $outputFilePath",
            base_path('modules/ruTS'),
        );

        $process->setTimeout(600);
        $process->mustRun();
    }
}
