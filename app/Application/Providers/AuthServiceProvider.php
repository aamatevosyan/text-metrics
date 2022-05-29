<?php

namespace App\Providers;

use App\Policies\DocumentProcessingRulePolicy;
use App\Policies\DocumentProcessorPolicy;
use App\Policies\DocumentTypePolicy;
use App\Policies\TextMetricComputerPolicy;
use App\Policies\TextMetricPolicy;
use Domain\DocumentProcessing\Models\DocumentProcessingRule;
use Domain\DocumentProcessing\Models\DocumentProcessor;
use Domain\DocumentProcessing\Models\DocumentType;
use Domain\Metrics\Models\TextMetric;
use Domain\Metrics\Models\TextMetricComputer;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        DocumentProcessingRule::class => DocumentProcessingRulePolicy::class,
        DocumentProcessor::class => DocumentProcessorPolicy::class,
        DocumentType::class => DocumentTypePolicy::class,
        TextMetricComputer::class => TextMetricComputerPolicy::class,
        TextMetric::class => TextMetricPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
