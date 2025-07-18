<?php
namespace App\Models;

use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable implements LaratrustUser
{
    use HasRolesAndPermissions;



    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


}
