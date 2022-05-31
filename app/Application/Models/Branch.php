<?php

namespace App\Models;

use App\Traits\HasBaseModel;
use Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NestedSet;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperBranch
 */
class Branch extends Model
{
    use HasBaseModel;
    use HasTranslations;
    use NodeTrait;
    use SoftDeletes;

    protected $fillable = [
        NestedSet::PARENT_ID,
        NestedSet::LFT,
        NestedSet::RGT,
        'branch_type_id',
        'name'
    ];

    protected array $translatable = [
        'name'
    ];

    protected ?array $monitoredMetricResults = null;

    public function branchType(): BelongsTo
    {
        return $this->belongsTo(BranchType::class);
    }

    public function courseWorks(): HasManyThrough
    {
        return $this->hasManyThrough(CourseWork::class, Student::class);
    }

    public function getMonitoredMetricResults(): array
    {
        if (is_null($this->monitoredMetricResult)) {
            try {
                $branches = self::descendantsAndSelf($this->id)->pluck('id');

                $courseWorks = self::query()
                    ->whereIn('id', $branches)
                    ->with(['courseWorks' => fn($q) => $q->with('monitoredMetricResult')])
                    ->get()
                    ->pluck('courseWorks')
                    ->flatten()
                    ->filter()
                    ->map(function (CourseWork $courseWork) {
                        return $courseWork->only([
                            'cohesion_group_value',
                            'diversity_group_value',
                            'readability_group_value',
                            'font_group_value',
                            'plagiat_group_value'
                        ]);
                    })
                    ->toArray();

                $this->monitoredMetricResult = array_average_by_key($courseWorks);
            } catch (\Exception $e) {
                $this->monitoredMetricResult = [];
            }
        }

        return $this->monitoredMetricResult;
    }

    public function getPlagiatGroupValueAttribute(): ?float
    {
        return Arr::get($this->getMonitoredMetricResults() ?? [], 'plagiat_group_value');
    }

    public function getReadabilityGroupValueAttribute(): ?float
    {
        return Arr::get($this->getMonitoredMetricResults() ?? [], 'readability_group_value');
    }

    public function getDiversityGroupValueAttribute(): ?float
    {
        return Arr::get($this->getMonitoredMetricResults() ?? [], 'diversity_group_value');
    }

    public function getCohesionGroupValueAttribute(): ?float
    {
        return Arr::get($this->getMonitoredMetricResults() ?? [], 'cohesion_group_value');
    }

    public function getFontGroupValueAttribute(): ?float
    {
        return Arr::get($this->getMonitoredMetricResults() ?? [], 'font_group_value');
    }
}
