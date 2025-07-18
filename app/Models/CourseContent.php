<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    protected $fillable = ['course_id', 'module_number', 'title', 'items'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
