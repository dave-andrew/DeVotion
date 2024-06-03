<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspaceteam extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'teamspace_id',
    ];

    public function setKeysForSaveQuery($query)
    {
        return $query
            ->where('workspace_id', $this->getAttribute('workspace_id'))
            ->where('teamspace_id', $this->getAttribute('teamspace_id'));
    }
}
