<?php

namespace Domain\DocumentProcessing\Enums;

enum DocumentTypeStatus: int
{
    case Disabled = 0;
    case Active = 1;
}
