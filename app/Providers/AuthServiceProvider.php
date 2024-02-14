<?php

namespace App\Providers;

use App\Policies\BookPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Book;
//use Illuminate\Auth\Access\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Book::class => BookPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin', function($user){
            return $user->rol == 'admin';
        });

        Gate::define('isManager', function($user){
            return $user->rol == 'manager';
        });
        Gate::define('isUser', function($user){
            return $user->rol == 'user';
        });
    }
}
