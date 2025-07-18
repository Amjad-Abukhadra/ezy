<?php

namespace App\Http\Controllers;
use App\Models\ContentTopic;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Project;
use App\Models\CourseContent;
use App\Models\Objective;

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

    public function saveObjectives(Request $request, $courseId)
    {
        $objectives = $request->input('data');
        // Validate and save each objective to DB
        foreach ($objectives as $obj) {
            Objective::updateOrCreate(
                ['course_id' => $courseId, 'title' => $obj['title']],
                ['description' => $obj['description']]
            );
        }
        return response()->json(['success' => true]);
    }

    public function saveProjects(Request $request, $courseId)
    {
        $projects = $request->input('data');
        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['course_id' => $courseId, 'title' => $project['title']],
                ['description' => $project['description']]
            );
        }
        return response()->json(['success' => true]);
    }
    public function saveModules(Request $request, Course $course)
    {
        $modulesData = $request->input('data', []);

        // Process modules data and save (update/create) in DB linked to $course
        // Example: loop through $modulesData and save each module

        return response()->json(['success' => true]);
    }

    public function saveContent(Request $request, Course $course)
    {
        $contentData = $request->input('data', []);

        // Process content data similarly

        return response()->json(['success' => true]);
    }

}
