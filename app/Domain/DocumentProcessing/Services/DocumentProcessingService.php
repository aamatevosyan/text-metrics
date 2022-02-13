<?php

namespace Domain\DocumentProcessing\Services;

use App\Enums\CourseWorkType;
use App\Models\Branch;
use Domain\DocumentProcessing\Models\DocumentProcessingRule;
use Domain\DocumentProcessing\Models\DocumentType;
use Illuminate\Database\Eloquent\Builder;

class DocumentProcessingService
{
    public function getDocumentProcessingRule(int $branchId, CourseWorkType $courseWorkType, string $mimeType):
    DocumentProcessingRule {
        /** @var DocumentType $documentType */
        $documentType = DocumentType::query()
            ->whereJsonContains('mime_types', $mimeType)
            ->first();

        $rules = DocumentProcessingRule::query()
            ->where(
                fn(Builder $q) => $q->whereNull('course_work_type')
                    ->orWhere('course_work_type', $courseWorkType)
            )
            ->where(
                fn(Builder $q) => $q->whereNull('branch_id')
                    ->orWhereIn('branch_id', Branch::descendantsAndSelf($branchId, ['id'])
                        ->pluck('id'))
            )
            ->where('document_processor_id', $documentType->processors()->pluck('document_processors.id'))
            ->orderByRaw('branch_id DESC NULLS LAST')
            ->orderByRaw('course_work_type DESC NULLS LAST');

        /** @var DocumentProcessingRule $selectedRule */
        $selectedRule = $rules->firstOrFail();

        return $selectedRule;
    }
}
