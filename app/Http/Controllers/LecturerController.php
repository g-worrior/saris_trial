<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::Join('users', 'users.id', '=', 'lecturers.user_id')->get();

        return view('admin.lecturers', compact('lecturers'));
    }

    public function create()
    {
        return view('admin.add-lecturer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gender' => 'required|string',
            'title' => 'required|string',
            'dob' => 'required|date',
            'fullname' => 'required|string',
            'phone1' => 'required|string',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']

        ]);

        $user = new User();
        $user->name = $request->input('fullname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $role = DB::table('model_has_roles')->insert([
            'role_id' => $request->role,
            'model_type' => 'App\Models\User',
            'model_id' => $user->id
        ]);

        $lecturer = new Lecturer();
        $lecturer->user_id = $user->id;
        $lecturer->gender = $request->input('gender');
        $lecturer->title = $request->input('title');
        $lecturer->dob = $request->input('dob');
        $lecturer->phone1 = $request->input('phone1');
        if ($request->phone2) {
            $lecturer->phone2 = $request->input('phone2');
        }
        $lecturer->save();

        return redirect('/access/lecturers')->with('success', 'Lecturer created successfully!');
    }

    // get lecturer assigned courses
    public function my_courses()
    {

        $courses = DB::table('course_assignments')
            ->join('courses', 'course_assignments.course_id', '=', 'courses.course_id')
            ->join('lecturers', 'course_assignments.lecturer_id', '=', 'lecturers.lecturer_id')
            ->join('users', 'lecturers.user_id', '=', 'users.id')
            ->select('courses.course_id', 'courses.course_name', 'courses.course_code')
            ->where('users.id', '=', Auth::user()->id)
            ->get();

        // return $courses;
        return view('lecturer.my-courses', compact('courses'));
    }

    //view selected course
    public function view_course($encrypted_code)
    {
        $course_code = Crypt::decrypt($encrypted_code);
        $course = Course::where('course_code', $course_code)->first();

        $students = DB::table('students')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->join('student_enrollments', 'students.student_regi_no', '=', 'student_enrollments.student_regi_no')
            ->join('semesters', 'student_enrollments.semester_id', '=', 'semesters.semester_id')
            ->where('student_enrollments.course_code', $course_code)
            ->where('semesters.s_is_current', 1)
            ->select('students.student_regi_no', 'students.gender', 'users.name')
            ->distinct()
            ->get();

        return view('lecturer.course', compact('course', 'students'));
    }

}