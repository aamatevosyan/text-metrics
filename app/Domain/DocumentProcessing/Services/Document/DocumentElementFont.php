<?php

namespace Domain\DocumentProcessing\Services\Document;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class DocumentElementFont extends Data
{
    public function __construct(
        public string $family_name,
        public string $alt_family_name,
        public string $name,
        public int $size,
        public bool $italic = false,
        public bool $monospaced = false,
        public int $weight = 0,
    ) {
    }
}
