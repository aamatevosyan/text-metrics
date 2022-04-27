<?php

namespace Domain\Metrics\Models;

use App\Models\IdeHelperTextMetric;
use App\Traits\HasBaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $name
 * @property int $text_metric_computer_id
 * @property string $description
 * @property string $slug
 * @property bool $numeric
 * @property bool $monitored
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @mixin IdeHelperTextMetric
 */
class TextMetric extends Model
{
    use HasBaseModel;
    use SoftDeletes;
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'text_metric_computer_id',
        'description',
        'slug',
        'numeric',
        'monitored',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'text_metric_computer_id' => 'integer',
        'numeric' => 'boolean',
        'monitored' => 'boolean',
    ];

    protected array $translatable = [
        'name',
        'description',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function textMetricComputer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TextMetricComputer::class);
    }
}
