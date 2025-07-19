<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function userPlans()
    {
        return $this->hasMany(UserPlan::class);
    }
}
