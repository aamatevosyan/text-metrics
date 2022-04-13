<?php

namespace App\Models;

use App\Traits\HasBaseModel;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperSectionBlock
 */
class SectionBlock extends Model
{
    use HasBaseModel, HasUuid;

    protected $fillable = [
      'uuid',
      'section_id',
      'content',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
