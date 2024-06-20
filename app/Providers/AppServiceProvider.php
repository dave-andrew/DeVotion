<?php

namespace App\Providers;

use App\Policies\NotePolicy;
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
        # Teamspaces
        Gate::define('teamspace-view', [TeamspacePolicy::class, 'view']);
        Gate::define('teamspace-create', [TeamspacePolicy::class, 'create']);
        Gate::define('teamspace-update', [TeamspacePolicy::class, 'update']);

        # Workspaces
        Gate::define('workspace-update', [WorkspacePolicy::class, 'update']);
        Gate::define('workspace-delete', [WorkspacePolicy::class, 'delete']);

        # Workspace Users
        Gate::define('user-isAdmin', [WorkspacePolicy::class, 'isAdmin']);
        Gate::define('user-isOwner', [WorkspacePolicy::class, 'isOwner']);
        Gate::define('user-isAdminOrOwner', [WorkspacePolicy::class, 'isAdminOrOwner']);

        # Notes
        Gate::define('note-delete', [NotePolicy::class, 'delete']);
    }
}
