<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teamspace extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'permission'
    ];

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }
}
