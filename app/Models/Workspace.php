<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'description',
        'type',
        'image'
    ];

    public function teamspaces()
    {
        return $this->hasMany(Teamspace::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'workspaceusers',  'workspace_id', 'user_id')->withPivot('role');
    }

}
