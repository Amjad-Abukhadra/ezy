<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentTopic extends Model
{
    protected $fillable = ['course_content_id', 'title'];

    public function courseContent()
    {
        return $this->belongsTo(CourseContent::class, 'course_content_id');
    }
}