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
        return $this->belongsTo(Workspace::class);
    }

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function invitedBy()
    {
        return $this->belongsTo(User::class, 'invited_by');
    }
}
