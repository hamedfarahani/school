<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Model
{
    use Notifiable;
    use HasRoles;
    use Notifiable;


    protected $guard_name = 'admin';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function teachers()
    {
        return $this->hasMany(Teacher::class, admin_id);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {

    }
}
