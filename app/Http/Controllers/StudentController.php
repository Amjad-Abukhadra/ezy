<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contact;

use App\Models\Course;
class StudentController extends Controller
{

    public function contact()
    {
        return view('contact'); // This is your contact.blade.php
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'issue' => 'required|string|max:100',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return response()->json(['success' => true]);
    }
    public function showPricing()
    {
        $plans = Plan::all();
        return view('pricing', compact('plans'));
    }
    public function selectPlan($id)
    {
        $plan = Plan::findOrFail($id);
        $user = Auth::user();

        // Check if user already has an active plan - this is just example logic
        // You can add more sophisticated logic later
        $userPlan = $user->plans()->where('end_date', '>=', now())->first();

        if ($userPlan) {
            return redirect()->back()->with('error', 'You already have an active plan.');
        }

        // Assign plan to user (start now, no end date for now)
        $user->plans()->create([
            'plan_id' => $plan->id,
            'start_date' => now(),
            'end_date' => null,
        ]);

        return redirect()->back()->with('success', 'Plan selected successfully!');
    }
    public function enroll(Course $course)
    {
        $user = Auth::user();

        // Check active plan and course limit
        $activePlan = $user->activePlan; // assumes you have this relation
        if (!$activePlan) {
            return redirect()->back()->with('error', 'You need to select a plan first.');
        }

        $planLimits = [
            1 => 6,
            2 => 12,
            3 => 16,
        ];

        $limit = $planLimits[$activePlan->plan_id] ?? 0;

        // Count user enrollments
        $enrollCount = $user->courses()->count(); // assuming many-to-many user-courses relation

        if ($enrollCount >= $limit) {
            return redirect()->back()->with('error', 'You have reached your enrollment limit for your plan.');
        }

        // Check if already enrolled
        if ($user->courses()->where('course_id', $course->id)->exists()) {
            return redirect()->back()->with('error', 'You are already enrolled in this course.');
        }

        // Enroll the user
        $user->courses()->attach($course->id);

        return redirect()->back()->with('success', 'You have successfully enrolled in the course!');
    }
}
