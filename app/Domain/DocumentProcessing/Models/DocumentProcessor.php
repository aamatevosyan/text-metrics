<?php

namespace Domain\DocumentProcessing\Models;

use App\Traits\HasBaseModel;
use App\Traits\HasUuid;
use Domain\DocumentProcessing\Enums\DocumentProcessorStatus;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperDocumentProcessor
 */
class DocumentProcessor extends Model
{
    use HasBaseModel, HasUuid;

    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'config',
        'status',
    ];

    protected $casts = [
        'status' => DocumentProcessorStatus::class,
        'config' => 'array',
    ];
}
