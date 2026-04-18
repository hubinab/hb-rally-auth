<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
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
        Model::shouldBeStrict();

        Gate::define("create-race", function (User $user){
            return $user->role === "admin";
        });
        Gate::define("update-race", function (User $user){
            return $user->role === "admin";
        });
        Gate::define("delete-race", function (User $user){
            return $user->role === "admin";
        });
        
        // A frontend teszt miatt az index-re is teszek
        // jogosultsag ellenorzest
        Gate::define("get-teams", function (User $user){
            return $user->role === "admin";
        });

        Gate::define("create-team", function (User $user){
            return $user->role === "admin";
        });
        Gate::define("update-team", function (User $user){
            return $user->role === "admin";
        });
    }
}
