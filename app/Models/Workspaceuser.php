<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspaceuser extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'workspace_id',
        'user_id',
        'role',
    ];

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('workspace_id', '=', $this->getAttribute('workspace_id'))
            ->where('user_id', '=', $this->getAttribute('user_id'));

        return $query;
    }
}
