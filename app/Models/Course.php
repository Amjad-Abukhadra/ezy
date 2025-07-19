<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'photo',
    ];
    public function objectives()
    {
        return $this->hasMany(Objective::class);
    }

    public function contents()
    {
        return $this->hasMany(CourseContent::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user')->withTimestamps();
    }
}
