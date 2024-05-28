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
    ];

    public function create(array $array)
    {
        $workspace = new Workspace();
        $workspace->name = $array['name'];
        $workspace->description = $array['description'];
        $workspace->save();

        return $workspace;
    }

    public function workspaceteam()
    {
        return $this->hasMany(Workspaceteam::class);
    }

}
