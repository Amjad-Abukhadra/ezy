<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\UserPlan;
use App\Models\Contact;
use App\Models\Course;
use Carbon\Carbon;

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

        $activePlan = $user->activePlan;

        if (!$activePlan) {
            return response()->json([
                'error' => 'You need to purchase a plan before enrolling.'
            ], 403);
        }

        $plan = Plan::find($activePlan->plan_id);
        if (!$plan) {
            return response()->json([
                'error' => 'Your plan is invalid or missing.'
            ], 400);
        }

        $courseLimit = $plan->course_limit;

        $enrollCount = $user->courses()->count();

        if ($enrollCount >= $courseLimit) {
            return response()->json([
                'error' => 'You have reached your course enrollment limit for your current plan.'
            ], 403);
        }

        if ($user->courses()->where('course_id', $course->id)->exists()) {
            return response()->json([
                'error' => 'You are already enrolled in this course.'
            ], 409);
        }

        $user->courses()->attach($course->id);

        return response()->json([
            'success' => true,
            'message' => 'Enrollment successful!'
        ]);
    }



    public function buyPlan(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
        ]);

        $userId = Auth::id();

        // Get the plan user wants to buy
        $newPlan = Plan::findOrFail($request->plan_id);

        // Get current active plan (if any)
        $currentPlan = UserPlan::where('user_id', $userId)
            ->where('end_date', '>', Carbon::now())
            ->latest('end_date')
            ->first();

        if ($currentPlan) {
            $currentPlanDetails = Plan::find($currentPlan->plan_id);

            if ($currentPlan->plan_id == $newPlan->id) {
                return redirect()->back()->with('error', 'You already have this plan active.');
            }

            // Check if the new plan price is less than current — downgrade NOT allowed
            if ($newPlan->price < $currentPlanDetails->price) {
                return redirect()->back()->with('error', 'Downgrade not allowed. You can only upgrade your plan.');
            }

            // Optional: You may want to expire current plan immediately or keep both
            // Here, let's expire current plan immediately before adding new one
            $currentPlan->end_date = Carbon::now();
            $currentPlan->save();
        }

        // Create new UserPlan record for the new plan
        $userPlan = new UserPlan();
        $userPlan->user_id = $userId;
        $userPlan->plan_id = $newPlan->id;
        $userPlan->start_date = Carbon::now();
        $userPlan->end_date = Carbon::now()->addDays(30);
        $userPlan->save();

        return redirect()->back()->with('success', 'Plan purchased successfully!');
    }
    public function studentCourses()
    {
        $user = Auth::user();

        $courses = Course::all();

        $activePlan = UserPlan::where('user_id', $user->id)
            ->where('end_date', '>', now())
            ->whereColumn('start_date', '<', 'end_date')
            ->latest('start_date')
            ->first();

        $planData = $activePlan ? Plan::find($activePlan->plan_id) : null;

        $enrolledCourseIds = $user->courses()->pluck('course_id')->toArray();

        return view('mycourses', compact('courses', 'planData', 'activePlan', 'enrolledCourseIds'));

    }

}
