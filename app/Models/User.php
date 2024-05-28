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
    protected $table = "users";
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $primaryKey = 'id';

    public function create(array $array)
    {
        $user = new User();
        $user->id = Str::uuid();
        $user->username = $array['username'];
        $user->email = $array['email'];
        $user->password = bcrypt($array['password']);
        $user->save();

        return $user;
    }


}
