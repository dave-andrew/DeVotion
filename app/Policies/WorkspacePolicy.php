<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Workspace;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkspacePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Workspace  $workspace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Workspace $workspace)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Workspace  $workspace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Workspace $workspace)
    {
        return $workspace->users->find($user->id)->pivot->role == 'owner' || $workspace->users->find($user->id)->pivot->role == 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Workspace  $workspace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Workspace $workspace)
    {
        return $workspace->users->find($user->id)->pivot->role == 'owner';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Workspace  $workspace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Workspace $workspace)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Workspace  $workspace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Workspace $workspace)
    {
        //
    }

    public function isAdmin(User $user, Workspace $workspace)
    {
        $data = $workspace->users()->where('user_id', $user->id)->first();

        if($data->role == 'admin') {
            return true;
        }
        return false;
    }

    public function isOwner(User $user, Workspace $workspace)
    {
        $data = $workspace->users()->where('user_id', $user->id)->first();

        if($data->pivot->role == 'owner') {
            return true;
        }
        return false;
    }

    public function isAdminOrOwner(User $user, Workspace $workspace)
    {
        $data = $workspace->users()->where('user_id', $user->id)->first();

        if($data->pivot->role == 'owner' || $data->pivot->role == 'admin') {
            return true;
        }

        return false;
    }
}
