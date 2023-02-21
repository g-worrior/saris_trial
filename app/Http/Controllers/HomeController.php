<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Semester;
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

            $student_id = Student::join('users', 'users.id', '=', 'students.user_id')
                ->where('id', Auth::user()->id)->first()->student_id;
            $semester_id = Semester::where('s_is_current', 1)->first()->semester_id;

            $registered = DB::table('student_enrollments')
                ->where('student_id', $student_id)
                ->where('semester_id', $semester_id)
                ->exists();

            $registered_courses = DB::table('student_enrollments')
                ->join('students', 'students.student_id', '=', 'student_enrollments.student_id')
                ->join('users', 'students.user_id', '=', 'users.id')
                ->join('courses', 'courses.course_id', '=', 'student_enrollments.course_id')
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
            ->join('users', 'students.user_id', '=', 'users.id')
            ->join('undergraduate_students', 'students.undergraduate_student_id', '=', 'undergraduate_students.undergraduate_student_id')
            ->join('student_invoices', 'student_invoices.undergraduate_student_id', '=', 'undergraduate_students.undergraduate_student_id')
            ->join('invoices', 'student_invoices.invoice_id', '=', 'invoices.invoice_id')
            ->join('academic_years', 'invoices.academic_year_id', '=', 'academic_years.academic_year_id')
            ->join(DB::raw('(SELECT student_id, invoice_id, SUM(receipt_amount) as receipt_amount FROM receipts GROUP BY student_id, invoice_id) receipts'), function ($join) {
                $join->on('receipts.student_id', '=', 'students.student_id')
                    ->on('receipts.invoice_id', '=', 'invoices.invoice_id');
            })
            ->where('students.user_id', Auth::user()->id)
            ->groupBy(['students.student_id'])
            ->selectRaw('SUM(invoices.invoice_amount) - SUM(receipts.receipt_amount) as balance')
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

            return view(
                'home'
            );
        }

    }
}