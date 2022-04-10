<?php

namespace App\Http\Resources\CourseWork;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Inertia\Inertia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @mixin Media
 */
class CourseWorkDocumentResource extends JsonResource
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
            'size' => $this->size,
            'hash' => $this->custom_properties['hash'] ?? '',
            'url' => route('front.course-works.preview', [
                'course_work' => $this->model->uuid,
                'media' => $this->uuid,
            ]),
            'created_at' => $this->created_at,
        ];
    }
}
