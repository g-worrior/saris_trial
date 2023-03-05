<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $balance = null;
        $student = [];
        $registered = null;
        $registeredCourses = [];

        if (Auth::user()->hasRole('Student')) {
            // code to be executed if the user has the role of "Student"

            $student_regi_no = Student::join('users', 'users.id', '=', 'students.user_id')
                ->where('users.id', Auth::user()->id)->first()->student_regi_no;
            $semester_id = Semester::where('s_is_current', 1)->first()->semester_id;

            $registered = DB::table('student_enrollments')
                ->where('student_regi_no', $student_regi_no)
                ->where('semester_id', $semester_id)
                ->exists();

            $registered_courses = DB::table('student_enrollments')
                ->join('students', 'students.student_regi_no', '=', 'student_enrollments.student_regi_no')
                ->join('users', 'students.user_id', '=', 'users.id')
                ->join('courses', 'courses.course_code', '=', 'student_enrollments.course_code')
                ->join('semesters', 'semesters.semester_id', '=', 'student_enrollments.semester_id')
                ->where('users.id', Auth::user()->id)
                ->where('semesters.s_is_current', 1)
                ->get([
                    'courses.course_name',
                    'courses.course_code'
                ]);

            $student = Student::join('users', 'users.id', '=', 'students.user_id')
                ->join('programs', 'students.program_id', '=', 'programs.program_id')
                ->where('students.user_id', Auth::user()->id)
                ->first();
            // return $student;

            $balance = DB::table('students')
            ->Join('users', 'students.user_id', '=', 'users.id')
            ->leftJoin('student_invoices', 'students.student_regi_no', '=', 'student_invoices.student_regi_no')
            ->leftJoin('invoices', 'student_invoices.invoice_id', '=', 'invoices.invoice_id')
            ->leftJoin(DB::raw('(SELECT student_regi_no, SUM(receipt_amount) AS total_received FROM receipts GROUP BY student_regi_no) AS receipts_total'), 'students.student_regi_no', '=', 'receipts_total.student_regi_no')
            ->select('users.name', 'students.year_of_study', 'students.student_regi_no', DB::raw('SUM(invoices.invoice_amount) - COALESCE(receipts_total.total_received, 0) AS balance'))
            ->groupBy('students.student_regi_no', 'users.name', 'students.year_of_study')
            ->where('students.user_id', Auth::user()->id)
            ->first()
            ->balance;

            return view(
                'home',
                compact(
                    'balance',
                    'student',
                    'registered',
                    'registered_courses'
                )
            );
        } else {
            $countStudents = User::role('Student')->count();
            $countLecturers = User::role('Lecturer')->count();
            $countMaleStudents = User::role('Student')->join('students','students.user_id', '=', 'users.id')->where('gender', 'Male')->count();
            $countFemaleStudents = User::role('Student')->join('students','students.user_id', '=', 'users.id')->where('gender', 'Female')->count();
            
            return view(
                'home',
                compact([
                    'countStudents',
                    'countLecturers',
                    'countMaleStudents',
                    'countFemaleStudents'
                ])
            );
        }

    }
}