<?php

namespace Domain\DocumentProcessing\Models;

use App\Traits\HasBaseModel;
use App\Traits\HasUuid;
use Domain\DocumentProcessing\Enums\DocumentTypeStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperDocumentType
 */
class DocumentType extends Model
{
    use HasBaseModel, HasUuid;

    protected $fillable = [
        'uuid',
        'name',
        'mime_types',
        'status',
    ];

    protected $casts = [
        'mime_types' => 'array',
        'status' => DocumentTypeStatus::class,
    ];

    public function documentProcessors(): BelongsToMany
    {
        return $this->belongsToMany(DocumentProcessor::class);
    }
}
