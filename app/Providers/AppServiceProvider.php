<?php

namespace App\Providers;

use App\Policies\TeamspacePolicy;
use App\Policies\WorkspacePolicy;
use App\Policies\WorkspaceuserPolicy;
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

        Gate::define('teamspace-view', [TeamspacePolicy::class, 'view']);

        Gate::define('user-isAdmin', [WorkspacePolicy::class, 'isAdmin']);

        Gate::define('user-isOwner', [WorkspacePolicy::class, 'isOwner']);

        Gate::define('user-isAdminOrOwner', [WorkspacePolicy::class, 'isAdminOrOwner']);
    }
}
