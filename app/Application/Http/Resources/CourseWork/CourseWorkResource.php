<?php

namespace App\Http\Resources\CourseWork;

use App\Models\CourseWork;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin CourseWork
 */
class CourseWorkResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'supervisor' => $this->supervisor->name,
            'status' => $this->status,
            'documents' => CourseWorkDocumentResource::collection($this->media()->with('model')->get()),
        ];
    }
}
