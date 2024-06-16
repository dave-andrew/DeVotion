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
        $this->belongsTo(User::class, 'user_id');
    }

    function invited_by(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        $this->belongsTo(User::class, 'invited_by');
    }
}
