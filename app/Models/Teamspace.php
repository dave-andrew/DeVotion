<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Teamspace extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'permission'
    ];

    public function workspaces()
    {
        return $this->belongsTo(Workspace::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

}
