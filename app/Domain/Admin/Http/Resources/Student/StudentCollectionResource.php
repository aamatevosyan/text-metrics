<?php

namespace Domain\Admin\Http\Resources\Student;

use App\Http\Resources\PaginatedCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentCollectionResource extends JsonResource
{
  /**
   * Transform the resource collection into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request): array
  {
    return [
      'data' => (new PaginatedCollection(
        $this->resource,
        StudentInListResource::class
      ))->toArray($request),
      'filters' => [],
      'filtersUi' => [],
    ];
  }
}
