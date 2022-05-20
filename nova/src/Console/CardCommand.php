<?php

namespace Laravel\Nova\Console;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class CardCommand extends ComponentGeneratorCommand
{
    use RenamesStubs;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nova:card {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new card';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (! $this->hasValidNameArgument()) {
            return;
        }

        (new Filesystem)->copyDirectory(
            __DIR__.'/card-stubs',
            $this->componentPath()
        );

        // Card.js replacements...
        $this->replace('{{ title }}', $this->componentTitle(), $this->componentPath().'/resources/js/components/Card.vue');
        $this->replace('{{ component }}', $this->componentName(), $this->componentPath().'/resources/js/card.js');

        // Card.php replacements...
        $this->replace('{{ namespace }}', $this->componentNamespace(), $this->componentPath().'/app/Card.stub');
        $this->replace('{{ class }}', $this->componentClass(), $this->componentPath().'/app/Card.stub');
        $this->replace('{{ component }}', $this->componentName(), $this->componentPath().'/app/Card.stub');

        (new Filesystem)->move(
            $this->componentPath().'/app/Card.stub',
            $this->componentPath().'/app/'.$this->componentClass().'.php'
        );

        // CardServiceProvider.php replacements...
        $this->replace('{{ namespace }}', $this->componentNamespace(), $this->componentPath().'/app/CardServiceProvider.stub');
        $this->replace('{{ component }}', $this->componentName(), $this->componentPath().'/app/CardServiceProvider.stub');
        $this->replace('{{ name }}', $this->componentName(), $this->componentPath().'/app/CardServiceProvider.stub');

        // webpack.mix.js replacements...
        $this->replace('{{ name }}', $this->component(), $this->componentPath().'/webpack.mix.js');

        // Card composer.json replacements...
        $this->prepareComposerReplacements();

        // Rename the stubs with the proper file extensions...
        $this->renameStubs();

        // Register the card...
        $this->buildComponent('card');
    }

    /**
     * Get the array of stubs that need PHP file extensions.
     *
     * @return array
     */
    protected function stubsToRename()
    {
        return [
            $this->componentPath().'/app/CardServiceProvider.stub',
            $this->componentPath().'/routes/api.stub',
        ];
    }

    /**
     * Get the "title" name of the card.
     *
     * @return string
     */
    protected function componentTitle()
    {
        return Str::title(str_replace('-', ' ', $this->componentName()));
    }
}
