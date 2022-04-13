<?php

namespace App\Models;

use App\Traits\HasBaseModel;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @mixin IdeHelperSection
 */
class Section extends Model
{
    use HasBaseModel, HasUuid;

    protected $fillable = [
        'parent_id',
        'uuid',
        'media_id',
        'name',
    ];

    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }
}
