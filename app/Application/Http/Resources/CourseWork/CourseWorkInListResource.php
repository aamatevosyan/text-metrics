<?php

namespace App\Http\Resources\CourseWork;

use App\Models\CourseWork;
use Domain\Metrics\Models\MonitoredMetricResult;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin CourseWork
 */
class CourseWorkInListResource extends JsonResource
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
            'type' => $this->type,
            'supervisor' => $this->supervisor->name,
            'student' => $this->student->name,
            'status' => $this->status,
            'plagiat_percentage' => $this->monitoredMetricResult?->results['plagiat_percentage'] ?? null,
            'created_at' => $this->created_at->toDateString(),
        ];
    }
}
