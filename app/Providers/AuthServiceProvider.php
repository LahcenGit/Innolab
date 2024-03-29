<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
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
        Gate::define('dashboard.patient',function(){
            return Auth::user()->type == 'patient';
           });

        Gate::define('dashboard.labo',function(){
            return Auth::user()->type == 'labo';
           });
        Gate::define('dashboard.doctor',function(){
            return Auth::user()->type == 'doctor';
           });
        //
    }
}
