<?php

namespace App\Models;

use App\Enums\DocumentElementType;
use App\Traits\HasBaseModel;
use App\Traits\HasUuid;
use Domain\Metrics\Models\DocumentMetricResult;
use Domain\Metrics\Models\MonitoredMetricResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @mixin IdeHelperDocument
 */
class Document extends Model
{
    use HasBaseModel;
    use HasUuid;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'media_id',
        'course_work_id',
        'content',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_work_id' => 'integer',
        'media_id' => 'integer',
        'content' => 'array',
    ];

    /**
     * @return BelongsTo
     */
    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    /**
     * @return BelongsTo
     */
    public function courseWork(): BelongsTo
    {
        return $this->belongsTo(CourseWork::class);
    }

    public function monitoredMetricResult(): HasOne
    {
        return $this->hasOne(MonitoredMetricResult::class);
    }

    public function documentMetricResult(): HasOne
    {
        return $this->hasOne(DocumentMetricResult::class);
    }

    public function getParagraphs(): array
    {
        $func = static function ($element, &$data) use (&$func) {
            if ($element['type'] === DocumentElementType::Paragraph->value
                || $element['type'] === DocumentElementType::ListItem->value) {
                $data[$element['uuid']] = $element['text'];
            }

            if (!empty($element['children'])) {
                foreach ($element['children'] as $child) {
                   $func($child, $data);
                }
            }
        };

        $data = [];

        $func($this->content, $data);

        return $data;
    }

    public function getParagraphsText(): string
    {
        return implode('\n', $this->getParagraphs());
    }
}
