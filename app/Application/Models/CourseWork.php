<?php

namespace App\Models;

use App\Traits\HasBaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;
use Str;

/**
 * @mixin IdeHelperCourseWork
 */
class CourseWork extends Model
{
    use HasBaseModel, HasTranslations;

    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE = 1;

    protected $fillable = [
        'id',
        'uuid',
        'name',
        'student_id',
        'supervisor_id',
        'status',
    ];

    protected array $translatable = [
        'name',
    ];

    protected static function booted(): void
    {
        static::creating(fn(self $model) => $model->uuid = $model->uuid ?? Str::uuid()->toString());
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }
}
