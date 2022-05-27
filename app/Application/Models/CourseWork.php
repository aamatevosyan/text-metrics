<?php

namespace App\Models;

use App\Enums\CourseWorkStatus;
use App\Enums\CourseWorkType;
use App\Traits\HasBaseModel;
use App\Traits\HasUuid;
use Arr;
use Domain\Metrics\Models\MonitoredMetricResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperCourseWork
 */
class CourseWork extends Model implements HasMedia
{
    use HasBaseModel;
    use HasTranslations;
    use InteractsWithMedia;
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'student_id',
        'supervisor_id',
        'status',
        'type',
    ];

    protected $casts = [
        'type' => CourseWorkType::class,
        'status' => CourseWorkStatus::class,
    ];

    protected array $translatable = [
        'name',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(Supervisor::class);
    }

    public function monitoredMetricResult(): HasOne
    {
        return $this->hasOne(MonitoredMetricResult::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function getPlagiatGroupValueAttribute(): ?float
    {
        $result = Arr::get($this->monitoredMetricResult?->results ?? [], 'plagiat_percentage');

        return $result ? round($result, 2) : null;
    }

    public function getReadabilityGroupValueAttribute(): ?float
    {
        $result = Arr::get($this->monitoredMetricResult?->results ?? [], 'automated_readability_index');

        return $result ? round($result, 2) : null;
    }

    public function getDiversityGroupValueAttribute(): ?float
    {
        $result = Arr::get($this->monitoredMetricResult?->results ?? [], 'ttr');

        return $result ? round($result, 2) : null;
    }

    public function getCohesionGroupValueAttribute(): ?float
    {
        $result = Arr::get($this->monitoredMetricResult?->results ?? [], 'cohesion');

        return $result ? round($result, 2) : null;
    }

    public function getFontGroupValueAttribute(): ?float
    {
        $result = Arr::get($this->monitoredMetricResult?->results ?? [], 'times_new_roman');

        return $result ? round($result, 2) : null;
    }
}
