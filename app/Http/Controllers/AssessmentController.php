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

    public function update(Request $request)
    {
        // return $request;
        $request->validate([
            'description' => 'string',
            'type' => 'string',
            'maximum_score' => 'integer',
            'weight' => 'integer',
            'course_code' => 'string',
            'assessment_id' => 'string',
        ]);
        $current_sem_id = Semester::where('s_is_current', 1)->first()->semester_id;
        
        Assessment::where('assessment_id', $request->assessment_id)->update([
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'maximum_score' => $request->input('maximum_score'),
            'weight' => $request->input('weight'),
            'course_code' => $request->input('course_code'),
            'semester_id' => $current_sem_id,
        ]);

        if ($request->type) {
            Assessment::where('assessment_id', $request->assessment_id)
                ->update([
                    'type' => $request->input('type')
                ]);
        }


        return redirect()->back()->with('success', 'Assessment Updated Successfully');
    }
}