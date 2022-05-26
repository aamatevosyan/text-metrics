<?php

namespace App\Models;

use App\Enums\CourseWorkStatus;
use App\Enums\CourseWorkType;
use App\Traits\HasBaseModel;
use App\Traits\HasUuid;
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
}
