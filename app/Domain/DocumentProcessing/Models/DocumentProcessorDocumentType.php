<?php

namespace Domain\DocumentProcessing\Models;

use App\Models\IdeHelperDocumentProcessorDocumentType;
use App\Traits\HasBaseModel;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @mixin IdeHelperDocumentProcessorDocumentType
 */
class DocumentProcessorDocumentType extends Pivot
{
    use HasBaseModel;
}
