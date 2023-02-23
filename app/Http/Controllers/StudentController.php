<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Receipt;
use App\Models\Student;
use App\Models\Semester;
use App\Models\Department;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\StudentEnrollment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// use SebastianBergmann\ResourceOperations\generate;

class StudentController extends Controller
{
    //show all students
    public function show()
    {
        $students = Student::join('users', 'students.user_id', '=', 'users.id')
            ->get();
        return view('admin.students', compact('students'));
    }

    //get add student page
    public function create()
    {
        return view('admin.add-student');
    }

    //store student
    public function store(Request $request)
    {
        // return $request;

        // $id = IdGenerator::generate(['table' => 'students', 'length' => 6, 'prefix' => date('y')]);

        DB::table('students')->insert(
            [
                'student_id' => 2,
                'student_name' => $request->fullname,
                'email' => $request->email,
                'enrollment_year' => $request->enrollment_year,
                'program_id' => $request->program_id,
                'gender' => $request->gender,
                'dob' => $request->dob
            ]
        );
        return redirect('/access/students');

    }

    // fees statement
    public function get_statement()
    {
        // $invoices = Student::join('cohorts', 'students.cohort_id', '=', 'cohorts.cohort_id')
        // ->join('student_invoices', 'cohorts.cohort_id', '=', 'student_invoices.cohort_id')
        // ->join('invoices', 'student_invoices.invoice_id', '=', 'invoices.invoice_id')
        // ->leftjoin('receipts', 'invoices.invoice_id', '=', 'receipts.invoice_id')
        // ->where('students.student_id', '1')
        // ->select('students.student_id', DB::raw('SUM(invoices.invoice_amount) - COALESCE(SUM(receipts.receipt_amount), 0) as balance'))
        // ->GROUPBY('students.student_id')
        // ->get();


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


        // $studentInvoices = DB::table('students')
        //     ->join('student_invoices', 'students.cohort_id', '=', 'student_invoices.cohort_id')
        //     ->join('invoices', 'invoices.invoice_id', '=', 'student_invoices.invoice_id')
        //     ->leftjoin('receipts', 'invoices.invoice_id', '=', 'receipts.invoice_id')
        //     ->join('academic_years', 'academic_years.academic_year_id', '=', 'invoices.academic_year_id')
        //     ->where('students.user_id', Auth::user()->id)
        //     ->get([
        //         'invoices.*',
        //         'receipts.*',
        //         DB::raw("CONCAT(YEAR(academic_years.a_start_year), '/', YEAR(academic_years.a_end_year)) AS academic_year")
        //     ]);

        $studentInvoices = DB::table('students')
            ->join('student_invoices', 'students.undergraduate_student_id', '=', 'student_invoices.undergraduate_student_id')
            ->join('invoices', 'invoices.invoice_id', '=', 'student_invoices.invoice_id')
            ->leftjoin('receipts', function ($join) {
                $join->on('receipts.invoice_id', '=', 'invoices.invoice_id')
                    ->on('receipts.student_id', '=', 'students.student_id');
            })
            ->join('academic_years', 'academic_years.academic_year_id', '=', 'invoices.academic_year_id')
            ->where('students.user_id', Auth::user()->id)
            ->get([
                'invoices.*',
                'receipts.*',
                DB::raw("CONCAT(YEAR(academic_years.a_start_year), '/', YEAR(academic_years.a_end_year)) AS academic_year")
            ]);


        // return $studentInvoices;
        return view('student.fees-statment', compact('balance', 'studentInvoices'));
    }

    public function get_academic_profile()
    {
        $student = Student::select('students.*', 'departments.*', 'programs.*', 'guardians.*', 'emergency_contacts.*')
            ->join('programs', 'students.program_id', '=', 'programs.program_id')
            ->join('departments', 'programs.department_id', '=', 'departments.department_id')
            ->leftJoin('guardians', 'students.guardian_id', '=', 'guardians.guardian_id')
            ->leftJoin('emergency_contacts', 'students.emergency_contact_id', '=', 'emergency_contacts.emergency_contact_id')
            ->where('students.user_id', Auth::user()->id)
            ->first();

        return view('student.academic-profile', \compact('student'));
    }

    public function get_grades()
    {
        $results = DB::table('students')
            ->join('student_enrollments', 'students.student_id', '=', 'student_enrollments.student_id')
            ->join('courses', 'student_enrollments.course_id', '=', 'courses.course_id')
            ->join('semesters', 'student_enrollments.semester_id', '=', 'semesters.semester_id')
            ->join('academic_years', 'semesters.academic_year_id', '=', 'academic_years.academic_year_id')
            ->orderBy('academic_years.a_start_year', 'desc')
            ->orderBy('semesters.semester_name', 'asc')
            ->where('students.user_id', '=', Auth::user()->id)
            ->get();

        $formatted_results = [];

        foreach ($results as $result) {
            $academic_year = date("Y", strtotime($result->a_start_year)) . '/' . date("Y", strtotime($result->a_end_year));
            $semester_name = $result->semester_name;
            $course_code = $result->course_code;
            $course_name = $result->course_name;
            $grade = $result->grade;

            if (!isset($formatted_results[$academic_year])) {
                $formatted_results[$academic_year] = [];
            }

            if (!isset($formatted_results[$academic_year][$semester_name])) {
                $formatted_results[$academic_year][$semester_name] = [];
            }

            $formatted_results[$academic_year][$semester_name][] = [
                'course_code' => $course_code,
                'course_name' => $course_name,
                'grade' => $grade,
            ];
        }

        // return $formatted_results;

        return \view('student.grades', \compact('formatted_results'));
    }

    public function register()
    {

        $current_academic_year = AcademicYear::where('a_is_current', 1)
            ->select(DB::raw("CONCAT(YEAR(academic_years.a_start_year), '/', YEAR(academic_years.a_end_year)) AS academic_year"))
            ->first()->academic_year;

        $current_semester = Semester::where('s_is_current', 1)->first()->semester_name;

        $student_id = Student::join('users', 'users.id', '=', 'students.user_id')
            ->where('id', Auth::user()->id)->first()->student_id;

        $semester_id = Semester::where('s_is_current', 1)->first()->semester_id;

        $registered = DB::table('student_enrollments')
            ->where('student_id', $student_id)
            ->where('semester_id', $semester_id)
            ->exists();
        if ($registered) {
            return \redirect()->route('home');

        } else {
            $courses = Course::all();
            return \view(
                'student.register-courses',
                \compact(
                    'courses',
                    'current_academic_year',
                    'current_semester'
                )
            );
        }

    }

    public function register_courses(Request $request)
    {
        $student_id = Student::join('users', 'users.id', '=', 'students.user_id')
            ->where('id', Auth::user()->id)->first()->student_id;
        $semester_id = Semester::where('s_is_current', 1)->first()->semester_id;

        $validatedData = $request->validate([
            'courses' => 'required|array',
            'courses.*' => 'required|integer',
        ]);

        // Get the validated data
        $courses = $validatedData['courses'];

        // Insert the data into the database
        foreach ($courses as $course_id) {
            $enrollment = new StudentEnrollment();
            $enrollment->student_id = $student_id;
            $enrollment->course_id = $course_id;
            $enrollment->semester_id = $semester_id;
            $enrollment->save();
        }

        redirect()->route('home');
    }
}