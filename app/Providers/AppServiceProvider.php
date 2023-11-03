<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function(User $user){
            return $user->role === 1;
        });

        Gate::define('pembimbing', function(User $user){
            return $user->role === 2;
        });

        Gate::define('mahasiswa', function(User $user){
            return $user->role === 3;
        });

        Gate::define('adminpembimbing', function(User $user){
            // return $user->role === 1;
            // return $user->role === 2;
            return in_array($user->role, [1, 2]);
        });

        Gate::define('adminmahasiswa', function(User $user){
            // return $user->role === 1;
            // return $user->role === 3;
            return in_array($user->role, [1, 3]);
        });
        //
    }
}
