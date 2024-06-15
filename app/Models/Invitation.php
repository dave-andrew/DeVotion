<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;
    use HasUuids;

    function workspace()
    {
        $this->hasMany(Workspace::class);
    }

    function user()
    {
        $this->hasMany(User::class);
    }

    function invited_by()
    {
        $this->hasMany(User::class);
    }

}
