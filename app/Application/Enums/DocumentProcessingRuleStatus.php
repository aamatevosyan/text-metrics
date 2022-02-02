<?php

namespace App\Enums;

enum DocumentProcessingRuleStatus: int
{
    case Disabled = 0;
    case Active = 1;
}
