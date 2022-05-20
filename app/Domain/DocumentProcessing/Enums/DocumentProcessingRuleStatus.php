<?php

namespace Domain\DocumentProcessing\Enums;

enum DocumentProcessingRuleStatus: int
{
    case Disabled = 0;
    case Active = 1;
}
