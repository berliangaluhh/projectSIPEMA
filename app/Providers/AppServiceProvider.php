<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\Gate::define('is-mahasiswa', function ($user) {
            return $user->role === 'mahasiswa';
        });

        \Illuminate\Support\Facades\Gate::define('is-admin', function ($user) {
            return $user->role === 'admin';
        });
    }
}
