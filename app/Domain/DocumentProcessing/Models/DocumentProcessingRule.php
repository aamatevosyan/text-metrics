<?php

namespace Domain\DocumentProcessing\Models;

use App\Enums\CourseWorkType;
use App\Models\Branch;
use App\Traits\HasBaseModel;
use App\Traits\HasUuid;
use Domain\DocumentProcessing\Enums\DocumentProcessingRuleStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperDocumentProcessingRule
 */
class DocumentProcessingRule extends Model
{
    use HasBaseModel, HasUuid;

    protected $fillable = [
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

    public function documentProcessor(): BelongsTo
    {
        return $this->belongsTo(DocumentProcessor::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
