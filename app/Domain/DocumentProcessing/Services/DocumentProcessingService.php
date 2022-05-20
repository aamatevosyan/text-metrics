<?php

namespace Domain\DocumentProcessing\Services;

use App\Enums\CourseWorkType;
use App\Models\Branch;
use App\Models\CourseWork;
use Domain\DocumentProcessing\Models\DocumentProcessingRule;
use Domain\DocumentProcessing\Models\DocumentType;
use Domain\DocumentProcessing\Processors\AbstractDocumentProcessor;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
            ->where('document_processor_id', $documentType->documentProcessor()->pluck('document_processors.id'))
            ->orderByRaw('branch_id DESC NULLS LAST')
            ->orderByRaw('course_work_type DESC NULLS LAST');

        /** @var DocumentProcessingRule $selectedRule */
        $selectedRule = $rules->firstOrFail();

        return $selectedRule;
    }

    public function getDocumentProcessingRuleFromMedia(Media $media): DocumentProcessingRule
    {
        /** @var CourseWork $courseWork */
        $courseWork = $media->model;

        $student = $courseWork->student;
        $mimeType = $media->mime_type;
        $branchId = $student->branch_id;

        return $this->getDocumentProcessingRule($branchId, $courseWork->type, $mimeType);
    }

    public function process(Media $media): void
    {
        $rule = $this->getDocumentProcessingRuleFromMedia($media);
        $documentProcessor = $rule->documentProcessor;
        $config = array_merge(
            $documentProcessor->config,
            $rule->config,
        );

        $processor = AbstractDocumentProcessor::fromSlug($documentProcessor->slug, $config);
        $processor->process($media);
    }
}
