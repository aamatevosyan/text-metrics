<?php

namespace Domain\DocumentProcessing\Services\Document;

use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
enum DocumentElementLanguage: string
{
    case Russian = 'ru';
    case English = 'en';
}
