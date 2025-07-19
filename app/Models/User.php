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

    public function plans()
    {
        return $this->hasMany(UserPlan::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user')->withTimestamps();
    }

    public function activePlan()
    {
        return $this->hasOne(UserPlan::class)->where('end_date', '>=', now())->latest();
    }
}
