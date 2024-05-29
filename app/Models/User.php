<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Model implements Authenticatable
{
    use Notifiable, HasUuids;
    use \Illuminate\Auth\Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    protected $primaryKey = 'id';

    public function create(array $array)
    {
        $user = new User();
        $user->id = Str::uuid();
        $user->username = $array['username'];
        $user->email = $array['email'];
        $user->password = Hash::make($array['password']);
        $user->save();

        return $user;
    }


}
