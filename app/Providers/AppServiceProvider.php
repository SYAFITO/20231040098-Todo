<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        /*
        |--------------------------------------------------------------------------
        | ADMIN ONLY
        |--------------------------------------------------------------------------
        | Ganti email admin sesuai akun login kamu
        */
        Gate::define('admin-only', function (User $user) {
            return $user->role === 'admin';
        });

        /*
        |--------------------------------------------------------------------------
        | UPDATE PRODUCT
        |--------------------------------------------------------------------------
        | Admin bebas edit, user hanya miliknya sendiri
        */
        Gate::define('update', function (User $user, Product $product) {
            return $user->email === 'admin@gmail.com'
                || $user->id === $product->user_id;
        });

        /*
        |--------------------------------------------------------------------------
        | DELETE PRODUCT
        |--------------------------------------------------------------------------
        */
        Gate::define('delete', function (User $user, Product $product) {
            return $user->email === 'admin@gmail.com'
                || $user->id === $product->user_id;
        });
    }
}