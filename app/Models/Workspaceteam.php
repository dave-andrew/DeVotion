<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspaceteam extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'teamspace_id',
    ];

    public function create(array $array)
    {
        $workspaceteam = new Workspaceteam();
        $workspaceteam->id = $array['id'];
        $workspaceteam->teamspace_id = $array['teamspace_id'];
        $workspaceteam->save();

        return $workspaceteam;
    }
}
