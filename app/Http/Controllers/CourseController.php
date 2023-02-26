<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseAssignment;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //get all courses
    public function index()
    {
        $courses = Course::all();

        return \view('admin.courses', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_code' => 'required|string',
            'course_name' => 'required|string',
            'credit_hours' => 'required|string'
        ]);

        $course = new Course();
        $course->course_code = $request->input('course_code');
        $course->course_name = $request->input('course_name');
        $course->credit_hours = $request->input('credit_hours');
        $course->save();

        return redirect()->back()->with('success', 'Course Added Successfully');
    }

    public function course_assignment()
    {
        $lecturers = Lecturer::Join('users', 'users.id', '=', 'lecturers.user_id')->get();
        $courses = Course::all();

        return view('admin.course-assignment', compact('courses', 'lecturers'));
    }

    public function course_assignment_store(Request $request)
    {
        $validatedData = $request->validate([
            'lecturer_id' => 'integer',
            'courses' => 'required|array',
            'courses.*' => 'required|integer',
        ]);

        // Get the validated data
        $courses = $validatedData['courses'];

        // Insert the data into the database
        foreach ($courses as $course_id) {
            $courseAssignment = new CourseAssignment();
            $courseAssignment->lecture_id = $request->lecturer_id;
            $courseAssignment->course_id = $course_id;
            $courseAssignment->save();
        }
        return redirect()->back()->with('success', 'Courses Assigned Successfully');
    }
}
