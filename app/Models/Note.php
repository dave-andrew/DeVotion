<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title'
    ];

    public function teamspace()
    {
        return $this->belongsTo(Teamspace::class);
    }

    public function notedetails()
    {
        return $this->hasMany(Notedetail::class);
    }
}
