<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use JMac\Testing\Traits\AdditionalAssertions;

abstract class TestCase extends BaseTestCase
{
    protected bool $seed = true;

    protected array $connectionsToTransact = ['pgsql'];

    use CreatesApplication, AdditionalAssertions, RefreshDatabase;
}
