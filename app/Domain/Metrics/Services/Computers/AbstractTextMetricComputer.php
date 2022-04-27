<?php

namespace Domain\Metrics\Services\Computers;

abstract class AbstractTextMetricComputer
{
    public function __construct(protected array $config = [])
    {
    }
}
