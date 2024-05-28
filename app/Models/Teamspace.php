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

    public function create(array $array)
    {
        $teamspace = new Teamspace();
        $teamspace->permission = $array['permission'];
        $teamspace->save();

        return $teamspace;
    }
}
