<?php

namespace App\Http\Controllers;

use App\Models\Course;


class CourseController extends Controller
{
    public function ShowCourseSelector()
    {
        return view('course_selector');
    }

    public function ShowCourses()
    {
        return view('courses');  // your Blade file name without extension
    }

    // Return JSON list of courses for AJAX fetch
    public function getCourses()
    {
        $courses = Course::select('id', 'name', 'description', 'status', 'photo', 'created_at')->get();

        return response()->json([
            'success' => true,
            'data' => $courses
        ]);
    }
    public function showCoursePage($id)
    {
        // Eager load relationships for objectives, contents, projects
        $course = Course::with(['objectives', 'contents', 'projects'])->findOrFail($id);

        return view('course-page', compact('course'));
    }


}
