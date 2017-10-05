<?php

namespace App\Models;

use App\Traits\UserRoleTraits;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApitokens,
        UserRoleTraits,
        Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'user_name',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_roles', 'user_id', 'role_id');
    }

    public function register($entity) {

        $this->full_name = $entity['full_name'];
        $this->user_name = $entity['user_name'];
        $this->email = $entity['email'];
        if(isset($entity['password'])) {
            $this->password = bcrypt($entity['password']);
        }

        $this->save();

        if(isset($entity['roles'])) {
            $rolesToArray = explode(",",$entity["roles"]);
            $this->addNewRole($rolesToArray);
        }

        return $this;
    }

    public function passwordChange() {
        
    }



}
