<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class AdminController extends Controller
{
    public function showDashboard()
    {
        $courses = Course::all();
        return view('admin.dashboard', compact('courses'));
    }

    public function storeCourse(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:1,2,3', // You can customize the status options
            'photo' => 'nullable|image|max:2048',
        ]);

        $path = $request->file('photo')?->store('courses', 'public');

        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'photo' => $path,
        ]);

        return redirect()->back()->with('success', 'Course created successfully!');
    }
    public function destroy(Course $course)
    {
        // Delete image file if exists
        if ($course->photo) {
            \Storage::disk('public')->delete($course->photo);
        }

        $course->delete();

        return response()->json([
            'success' => true,
            'message' => 'Course deleted successfully',
        ]);
    }


}


