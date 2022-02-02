<?php

namespace Domain\DocumentProcessing\Models;

use App\Enums\DocumentTypeStatus;
use App\Traits\HasBaseModel;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperDocumentType
 */
class DocumentType extends Model
{
    use HasBaseModel, HasUuid;

    protected $fillable = [
        'id',
        'uuid',
        'name',
        'mime_types',
        'status',
    ];

    protected $casts = [
        'mime_types' => 'array',
        'status' => DocumentTypeStatus::class,
    ];
}
