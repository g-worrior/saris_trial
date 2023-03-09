<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Semester;
use Illuminate\Http\Request;

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
}