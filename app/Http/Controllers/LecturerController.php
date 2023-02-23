<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
}