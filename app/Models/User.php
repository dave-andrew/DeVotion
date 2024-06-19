<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements Authenticatable, AuthorizableContract
{
    use Notifiable, HasUuids;
    use \Illuminate\Auth\Authenticatable;
    use Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    protected $primaryKey = 'id';

    public function workspaces(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Workspace::class, 'workspaceusers', 'user_id', 'workspace_id')->withPivot('role');
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class, 'user_id')->orderBy('created_at');
    }

}
