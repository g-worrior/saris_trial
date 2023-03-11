<?php

namespace App\Http\Controllers;

use App\Models\AssessmentScore;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Models\StudentEnrollment;
use Illuminate\Support\Facades\Crypt;

/**
 * Summary of AssessmentController
 */
class AssessmentController extends Controller
{
    public function index()
    {

        return view('lecturer.course');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'string',
            'type' => 'string',
            'maximum_score' => 'integer',
            'weight' => 'integer',
            'course_code' => 'string'
        ]);

        $current_sem_id = Semester::where('s_is_current', 1)->first()->semester_id;

        $assessment = new Assessment();
        $assessment->description = $request->input('description');
        $assessment->type = $request->input('type');
        $assessment->maximum_score = $request->input('maximum_score');
        $assessment->weight = $request->input('weight');
        $assessment->course_code = $request->input('course_code');
        $assessment->semester_id = $current_sem_id;
        $assessment->save();

        return redirect()->back()->with('success', 'Assessment Added Successfully');
    }

    //edit assessment id is passed in request
    public function update(Request $request)
    {
        // return $request;
        $request->validate([
            'description' => 'string',
            'type' => 'string|nullable',
            'maximum_score' => 'integer',
            'weight' => 'integer',
            'course_code' => 'string',
            'assessment_id' => 'string',
        ]);

        if ($request->type) {
            Assessment::where('assessment_id', $request->assessment_id)
                ->update([
                    'type' => $request->input('type')
                ]);
        }
        Assessment::where('assessment_id', $request->assessment_id)
            ->update([
                'description' => $request->description,
                'maximum_score' => $request->maximum_score,
                'weight' => $request->weight,
                'course_code' => $request->course_code,
            ]);


        return redirect()->back()->with('success', 'Assessment Updated Successfully');
    }

    //delete an assessemnt using passed id
    public function destroy(Request $request)
    {
        $request->validate([
            'assessment_id' => 'integer'
        ]);

        Assessment::where('assessment_id', $request->assessment_id)->delete();

        return redirect()->back()->with('success', 'Assessment Deleted Successfully');
    }

    public function createScores($encrypted_assessment_id)
    {
        $assessment_id = Crypt::decrypt($encrypted_assessment_id);

        $assessment = Assessment::where('assessment_id', $assessment_id)->first();
        $course_code = Assessment::where('assessment_id', $assessment_id)
            ->first()
            ->course_code;
        $course_code_s = Course::where('course_code', $course_code)
            ->first()
            ->course_code;
        $course_name = Course::where('course_code', $course_code)
            ->first()
            ->course_name;

        $registered = StudentEnrollment::join('students', 'students.student_regi_no', '=', 'student_enrollments.student_regi_no')
            ->join('users', 'users.id', '=', 'students.user_id')
            ->join('semesters', 'semesters.semester_id', '=', 'student_enrollments.semester_id')
            ->leftJoin('assessment_scores', function ($join) use ($assessment_id) {
                $join->on('assessment_scores.student_regi_no', '=', 'student_enrollments.student_regi_no')
                    ->where('assessment_scores.assessment_id', $assessment_id);
            })
            ->join('assessments', function ($join) use ($assessment_id) {
                $join->on('assessments.semester_id', '=', 'semesters.semester_id')
                    ->where('assessments.assessment_id', '=', $assessment_id);
            })
            ->where([
                ['student_enrollments.course_code', $course_code],
                ['semesters.s_is_current', 1]
            ])
            ->select([
                'assessments.maximum_score',
                'users.name',
                'student_enrollments.student_regi_no',
                'student_enrollments.course_code',
                'assessment_scores.score'
            ])
            ->get();




        // return $assessment;
        return view(
            'lecturer.add-scores',
            compact(
                'registered',
                'course_code_s',
                'course_name',
                'assessment',
            )
        );
    }

    // store assessment scores in database
    /**
     * Summary of postScores
     * @param Request $request
     * @return Request
     */
    public function storeAssessmentScores(Request $request)
    {
        $assessmentId = $request->input('assessment_id');
        $regiNumbers = $request->input('student_regi_no');
        $grades = $request->input('grades');

        foreach ($regiNumbers as $index => $regiNumber) {
            // check if a score exists for this assessment and student
            $score = AssessmentScore::where('assessment_id', $assessmentId)
                ->where('student_regi_no', $regiNumber)
                ->first();

            if (!$score) {
                // if no score exists, create a new one
                $score = new AssessmentScore();
                $score->assessment_id = $assessmentId;
                $score->student_regi_no = $regiNumber;
            }

            // update the score
            $score->score = $grades[$index];
            $score->save();
        }

        return redirect()->back()->with('success', 'Scores Added/Updated successfully!');
    }


}