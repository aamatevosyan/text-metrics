<?php

namespace Domain\Metrics\Models;

use App\Models\CourseWork;
use App\Models\Document;
use App\Models\IdeHelperDocumentMetricResult;
use App\Traits\HasBaseModel;
use Cache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $course_work_id
 * @property int $document_id
 * @property string $results
 * @property string $detailed_results
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @mixin IdeHelperDocumentMetricResult
 */
class DocumentMetricResult extends Model
{
    use HasBaseModel, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_work_id',
        'document_id',
        'results',
        'section_results',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_work_id' => 'integer',
        'document_id' => 'integer',
        'results' => 'array',
        'detailed_results' => 'array',
        'section_results' => 'array',
    ];

    public static function booted()
    {
        self::created(function (self $documentMetricResult) {
            if ($documentMetricResult->results) {
                MonitoredMetricResult::where('id', $documentMetricResult->document_id)
                    ->update($documentMetricResult->only('results'));
            }
        });

        self::updating(function (self $documentMetricResult) {
            if ($documentMetricResult->results && $documentMetricResult->isDirty('results')) {
                $results = $documentMetricResult->results;

                $slugs = Cache::remember(
                    TextMetric::getCacheKey('slugs'),
                    now()->addMinutes(5),
                    fn() => TextMetric::query()
                        ->where('numeric', true)
                        ->where('monitored', true)
                        ->pluck('slug')
                );

                $results = collect($results)->only($slugs)->toArray();

                MonitoredMetricResult::where('id', $documentMetricResult->document_id)
                    ->update(compact('results'));
            }
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courseWork(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CourseWork::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function document(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}
