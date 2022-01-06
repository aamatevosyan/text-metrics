<?php

namespace App\Models;

use App\Traits\HasBaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

/**
 * @mixin IdeHelperBranchType
 */
class BranchType extends Model
{
    use HasBaseModel;
    use HasTranslations;

    protected $fillable = [
        'id',
        'name'
    ];

    protected array $translatable = [
        'name'
    ];

    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }
}
