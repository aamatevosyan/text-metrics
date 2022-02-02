<?php

namespace App\Models;

use App\Enums\CourseWorkStatus;
use App\Enums\CourseWorkType;
use App\Traits\HasBaseModel;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperCourseWork
 */
class CourseWork extends Model implements HasMedia
{
    use HasBaseModel, HasTranslations, InteractsWithMedia, HasUuid;

    protected $fillable = [
        'id',
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
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(Supervisor::class, 'supervisor_id');
    }
}
