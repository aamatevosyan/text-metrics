<?php

namespace Domain\Metrics\Services\Computers\Core\Interfaces;

interface IBatchable
{
    public function isBatch(): bool;
}
