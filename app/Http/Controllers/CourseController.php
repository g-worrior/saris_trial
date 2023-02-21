<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //get all courses
    public function index()
    {
        $courses = Course::all();

        return \view('admin.courses', compact('courses'));
    }
}
