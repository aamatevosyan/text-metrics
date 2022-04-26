<?php

namespace Domain\DocumentProcessing\Enums;

enum DocumentProcessorStatus: int
{
    case Disabled = 0;
    case Active = 1;
}
