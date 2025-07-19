<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    protected $fillable = ['course_id', 'module_number', 'title', 'description',];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function contentTopics()
    {
        return $this->hasMany(ContentTopic::class, 'course_content_id');
    }
}
