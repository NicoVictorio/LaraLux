<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('create-transaction-permission','App\Policies\HotelPolicy@createTransaction');
        Gate::define('edit-delete-transaction-permission','App\Policies\HotelPolicy@editDeleteTransaction');

        Gate::define('menu-permission','App\Policies\HotelPolicy@menu');

        Gate::define('create-permission','App\Policies\HotelPolicy@create');
        Gate::define('edit-permission','App\Policies\HotelPolicy@edit');
        Gate::define('delete-permission','App\Policies\HotelPolicy@delete');

        //
    }
}
