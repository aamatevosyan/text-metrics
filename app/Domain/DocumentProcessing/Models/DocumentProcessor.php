<?php

namespace Domain\DocumentProcessing\Models;

use App\Enums\DocumentProcessorStatus;
use App\Models\IdeHelperDocumentProcessor;
use App\Traits\HasBaseModel;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperDocumentProcessor
 */
class DocumentProcessor extends Model
{
    use HasBaseModel, HasUuid;

    protected $fillable = [
        'id',
        'uuid',
        'name',
        'class',
        'config',
        'status',
    ];

    protected $casts = [
        'status' => DocumentProcessorStatus::class,
        'config' => 'array',
    ];
}
