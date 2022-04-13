<?php

namespace App\Models;

use App\Traits\HasBaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function branchType(): BelongsTo
    {
        return $this->belongsTo(BranchType::class);
    }
}
