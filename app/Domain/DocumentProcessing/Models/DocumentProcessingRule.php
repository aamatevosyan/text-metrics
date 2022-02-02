<?php

namespace Domain\DocumentProcessing\Models;

use App\Enums\CourseWorkType;
use App\Enums\DocumentProcessingRuleStatus;
use App\Traits\HasBaseModel;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperDocumentProcessingRule
 */
class DocumentProcessingRule extends Model
{
    use HasBaseModel, HasUuid;

    protected $fillable = [
        'id',
        'uuid',
        'course_work_type',
        'branch_id',
        'document_processor_id',
        'status',
        'config',
    ];

    protected $casts = [
        'course_work_type' => CourseWorkType::class,
        'status' => DocumentProcessingRuleStatus::class,
        'config' => 'array',
    ];
}
