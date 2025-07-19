<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Project;
use App\Models\CourseContent;
use App\Models\Objective;
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
    public function showUsers()
    {
        $users = User::with('roles') // <-- add this
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin');
            })
            ->get();

        return view('admin.users', compact('users'));
    }
    public function editUser($id)
    {
        $user = User::findOrFail($id);

        // Assuming single role per user, get the first role name or null if none
        $role = $user->roles->pluck('name')->first();

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $role,
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|in:admin,student,trainer',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Update the role using Laratrust
        $user->syncRoles([$request->role]);

        return response()->json(['message' => 'User updated successfully']);
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['success' => true]);
    }
    public function storeContent(Request $request, Course $course)
    {
        $validated = $request->validate([
            'module_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $content = $course->contents()->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Content added successfully',
            'content' => $content,
        ]);
    }

    public function storeObjective(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $objective = $course->objectives()->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Objective added successfully',
            'objective' => $objective,
        ]);
    }

    public function storeProject(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project = $course->projects()->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Project added successfully',
            'project' => $project,
        ]);
    }
    public function manage(Course $course)
    {
        $course->load(['contents', 'objectives', 'projects']); // eager load relations if needed
        return view('admin.manage', compact('course'));
    }
    public function destroyContent(Course $course, CourseContent $content)
    {
        if ($content->course_id != $course->id) {
            return response()->json(['success' => false, 'message' => 'Content does not belong to this course.'], 403);
        }

        $content->delete();
        return response()->json(['success' => true]);
    }

    public function destroyObjective(Course $course, Objective $objective)
    {
        if ($objective->course_id != $course->id) {
            return response()->json(['success' => false, 'message' => 'Objective does not belong to this course.'], 403);
        }

        $objective->delete();
        return response()->json(['success' => true]);
    }

    public function destroyProject(Course $course, Project $project)
    {
        if ($project->course_id != $course->id) {
            return response()->json(['success' => false, 'message' => 'Project does not belong to this course.'], 403);
        }

        $project->delete();
        return response()->json(['success' => true]);
    }

}


