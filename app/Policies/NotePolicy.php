<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\Teamspace;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
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
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Note $note)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Teamspace $teamspace
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Workspace $workspace, Teamspace $teamspace)
    {
        if($teamspace->permission == 'public') {
            return true;
        }

        $role = $workspace->users->find($user->id)->pivot->role;

        if($teamspace->permission == 'private' && $role == 'owner') {
            return true;
        }

        return $role == 'admin' || $role == 'owner';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Workspace $workspace, Teamspace $teamspace)
    {
        if($teamspace->permission == 'public') {
            return true;
        }

        if($teamspace->permission == 'private' && $workspace->users->find($user->id)->pivot->role == 'owner') {
            return true;
        }

        return $workspace->users->find($user->id)->pivot->role == 'admin' || $workspace->users->find($user->id)->pivot->role == 'owner';
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
        return $workspace->users->find($user->id)->pivot->role == 'owner' || $workspace->users->find($user->id)->pivot->role == 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Note $note)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Note $note)
    {
        //
    }
}
