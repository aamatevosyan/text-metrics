<?php

namespace App\Http\Resources\CourseWork;

use App\Http\Resources\CollectionResource;

class CourseWorkCollectionResource extends CollectionResource
{
    public static function from($resource)
    {
        return new self($resource, CourseWorkResource::class);
    }
}
