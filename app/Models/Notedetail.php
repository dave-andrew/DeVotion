<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notedetail extends Model
{
    use HasFactory, HasUuids;

    public function notes()
    {
        return $this->belongsTo(Note::class, 'note_id');
    }
}
