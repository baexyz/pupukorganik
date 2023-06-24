<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('Manager', function ($user) {
            if (Auth::guard('pegawai')->check()) {
                return $user->role == 1;
            }
        });

        Gate::define('Pegawai', function ($user) {
            if (Auth::guard('pegawai')->check()) {
                return $user->role == 2;
            }
        });

        Gate::define('Pelanggan', function ($user) {
            return Auth::guard('web')->check();
        });
    }
}
