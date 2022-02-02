<?php

namespace App\Http\Resources;

use Adscom\LarapackFilters\FiltersAbstract;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CollectionResource extends JsonResource
{
    public function __construct(
        public $resource,
        public $itemResourceClass,
        public ?FiltersAbstract $filter = null,
        public array $filtersUi = []
    ) {
        parent::__construct($resource);
    }

    public function getFilters(): object
    {
        return (object) $this->filter?->getFilters();
    }

    public function getFiltersUi(): object
    {
        return (object) [];
    }

    public function getData($request): array
    {
        return (new PaginatedCollection(
            $this->resource,
            $this->itemResourceClass,
        ))->resolve($request);
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => $this->getData($request),
            'filters' => $this->getFilters(),
            'filtersUi' => $this->getFiltersUi(),
        ];
    }
}


