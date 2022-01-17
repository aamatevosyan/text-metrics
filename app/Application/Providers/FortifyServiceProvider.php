<?php

namespace App\Providers;

use App\Actions\Fortify\AuthenticateLoginAttempt;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Responses\Fortify\LoginResponse;
use App\Http\Responses\Fortify\PasswordResetResponse;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\PasswordResetResponse as PasswordResetResponseContract;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public static function registerRoutes($module = null): void
    {
        require(base_path('routes/fortify.php'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Fortify::ignoreRoutes();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerResponseBindings();
        $this->registerFortifyOverrideConfigPanels();

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::authenticateUsing(function ($request) {
            return (new AuthenticateLoginAttempt)($request);
        });
    }

    /**
     * Register the response bindings.
     *
     * @return void
     */
    protected function registerResponseBindings(): void
    {
        $this->app->singleton(PasswordResetResponseContract::class, PasswordResetResponse::class);
        $this->app->singleton(LoginResponseContract::class, LoginResponse::class);
    }

    private function registerFortifyOverrideConfigPanels(): void
    {
        if (preg_match("#^(admin|supervisor)\.#", request()->getHost(), $matches)) {
            $panel = $matches[1];
            config()->set('fortify.middleware', config("fortify.overrides.{$panel}.middleware"));
            config()->set('fortify.guard', config("fortify.overrides.{$panel}.guard"));
            config()->set('fortify.passwords', config("fortify.overrides.{$panel}.passwords"));
            config()->set('fortify.features', config("fortify.overrides.{$panel}.features"));
            config()->set('fortify.home', config("fortify.overrides.{$panel}.home"));
            config()->set('fortify.login', config("fortify.overrides.{$panel}.login"));
            config()->set('fortify.passwordReset', config("fortify.overrides.{$panel}.passwordReset"));
            config()->set('auth.defaults.guard', config('fortify.guard'));
        }
    }
}
