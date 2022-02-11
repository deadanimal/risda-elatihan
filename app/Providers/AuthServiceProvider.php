<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        // Gate::define('UlpkPeserta', function (User $user) {
        //     return $user->jenis_pengguna === "Peserta ULPK";
        // });

        // Gate::define('UlsUrusSetia', function (User $user) {
        //     return $user->jenis_pengguna === "Urus Setia ULS";
        // });

        // Gate::define('UlsUrusUlpk', function (User $user) {
        //     return $user->jenis_pengguna === "Urus Setia ULS";
        // });
    }
}
