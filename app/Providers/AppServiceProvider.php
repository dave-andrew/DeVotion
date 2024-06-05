<?php

namespace App\Providers;

use App\Policies\TeamspacePolicy;
use App\Policies\WorkspacePolicy;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('teamspace-create', [TeamspacePolicy::class, 'create']);

        Gate::define('workspace-delete', [WorkspacePolicy::class, 'delete']);
    }
}
