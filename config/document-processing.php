<?php

return [
    'processors' => [
        'basic-pdf' => [
            'handler' => \Domain\DocumentProcessing\Processors\Pdf\BasicPdfPhpProcessor::class,
            'config' => [
                'enabled' => true,
            ],
        ],
    ],
];
