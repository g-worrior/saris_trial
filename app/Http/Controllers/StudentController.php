<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Invoice;
use App\Models\Receipt;
use App\Models\Student;
use App\Models\Semester;
use App\Models\Department;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\StudentEnrollment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

// use SebastianBergmann\ResourceOperations\generate;

class StudentController extends Controller
{
    //show all students
    public function index()
    {
        $students = Student::join('users', 'students.user_id', '=', 'users.id')
            ->get();
        return view('admin.students', compact('students'));
    }


    // show aparticula student
    public function show($student_regi_no_encrypted)
    {
        $student_regi_no = Crypt::decrypt($student_regi_no_encrypted);
        $student_regi_no = Student::where('student_regi_no', $student_regi_no)->first()->student_regi_no;
        $student_name = Student::join('users', 'users.id', '=', 'students.user_id')
        ->where('student_regi_no', $student_regi_no)->first()->name;

        return view('admin.view-student', compact('student_regi_no', 'student_name'));
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
        $student_regi_no = Student::where('user_id', Auth::user()->id)->first()->student_regi_no;

        return view('student.fees-statment', compact('student_regi_no'));
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

        $student_regi_no = Student::join('users', 'users.id', '=', 'students.user_id')
            ->where('users.id', Auth::user()->id)->first()->student_regi_no;

        $semester_id = Semester::where('s_is_current', 1)->first()->semester_id;

        $registered = DB::table('student_enrollments')
            ->where('student_regi_no', $student_regi_no)
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
        // return $request;
        $student_regi_no = Student::join('users', 'users.id', '=', 'students.user_id')
            ->where('id', Auth::user()->id)->first()->student_regi_no;
        $semester_id = Semester::where('s_is_current', 1)->first()->semester_id;

        $validatedData = $request->validate([
            'courses' => 'required|array',
            'courses.*' => 'required|string',
        ]);

        // Get the validated data
        $courses = $validatedData['courses'];

        // Insert the data into the database
        foreach ($courses as $course_code) {
            $enrollment = new StudentEnrollment();
            $enrollment->student_regi_no = $student_regi_no;
            $enrollment->course_code = $course_code;
            $enrollment->semester_id = $semester_id;
            $enrollment->save();
        }

        return redirect()->route('home')->with('success', 'Registered Successfuly');
    }
}