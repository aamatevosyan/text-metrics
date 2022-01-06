<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        JetStream::ignoreRoutes();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerOverrideConfigPanels();
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }

    private function registerOverrideConfigPanels(): void
    {
        if (preg_match("#^(admin)\.#", request()->getHost(), $matches)) {
            $panel = $matches[1];
            config()->set('jetstream.middleware', config("fortify.overrides.{$panel}.middleware"));
            config()->set('jetstream.features', config("fortify.overrides.{$panel}.features"));
            config()->set('jetstream.profile_photo_disk', config("fortify.overrides.{$panel}.profile_photo_disk"));
        }
    }

    public static function registerRoutes($module = null): void
    {
        require(base_path('routes/jetstream.php'));
    }
}
