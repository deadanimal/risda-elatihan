<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('UlsPeserta', function (User $user) {
            return $user->jenis_pengguna === "Peserta ULS";
        });

        Gate::define('UlpkPeserta', function (User $user) {
            return $user->jenis_pengguna === "Peserta ULPK";
        });

        Gate::define('UlsUrusSetia', function (User $user) {
            return $user->jenis_pengguna === "Urus Setia ULS";
        });

        Gate::define('UlsUrusUlpk', function (User $user) {
            return $user->jenis_pengguna === "Urus Setia ULS";
        });

        Gate::define('AdminBTM', function (User $user) {
            return $user->jenis_pengguna === "AdminBTM";
        });
    }
}
