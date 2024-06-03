<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
        'content'
    ];

    public function teamspace()
    {
        return $this->belongsTo(Teamspace::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'workspaceusers', 'workspace_id', 'user_id');
    }

    public function notedetails()
    {
        return $this->hasMany(Notedetail::class);
    }
}
