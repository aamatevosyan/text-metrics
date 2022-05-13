<?php

namespace Domain\DocumentProcessing\Services\Document;

use App\Enums\DocumentElementType;
use Arr;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class DocumentElement extends Data
{
    public function __construct(
        #[WithCast(EnumCast::class)]
        public DocumentElementType $type,
        public string $uuid,
        #[WithCast(EnumCast::class)]
        public ?DocumentElementLanguage $lang,
        public ?float $page,
        public ?string $text,
        public ?DocumentElementFont $font,
        #[DataCollectionOf(self::class)]
        public DataCollection $children,
    ) {

    }

    public function flatten(): Collection
    {
        $data = collect();

        $data->push(self::from(
            array_merge(
            $this->all(),
                ['children' => []]
        )));

        foreach ($this->children as $child) {
            $data = $data->concat($child->flatten());
        }

        return $data;
    }

    public function getWholeText(): string
    {
        return implode('\n', $this->flatten()->pluck('text')->toArray());
    }
}
