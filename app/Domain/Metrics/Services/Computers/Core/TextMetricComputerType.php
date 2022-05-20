<?php

namespace Domain\Metrics\Services\Computers\Core;

enum TextMetricComputerType: int
{
    case TEXT_BASED = 0;
    case DOCUMENT_BASED = 1;
}
