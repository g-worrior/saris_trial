<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::role(['Admin', 'Principal', 'Accounts'])->get();

        return view('admin.users', compact('users'));
    }

    public function create()
    {
        return view('admin.add-user'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string',
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
        
        return redirect('/access/other-users')->with('success', 'Lecturer created successfully!');
    }
}
