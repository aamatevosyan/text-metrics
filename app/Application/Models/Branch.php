<?php

namespace App\Models;

use App\Traits\HasBaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    protected $fillable = [
        'id',
        NestedSet::PARENT_ID,
        NestedSet::LFT,
        NestedSet::RGT,
        'branch_type_id',
        'name'
    ];

    protected array $translatable = [
        'name'
    ];

    public function type(): HasOne
    {
        return $this->hasOne(BranchType::class);
    }
}
