<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user')->with('users', $users);
    }

    public function adduser(Request $request) {
        $user = User::create($request->all());
        return response()->json($user);
    }

    public function edituser($user_id) {
        $user = User::find($user_id);
        return response()->json($user);
    }
    // #may error undetermine
    // public function getusersrole() {
    //     $users = User::all();
    //     return response()->json($users);
    // }

    public function updateuser(Request $request, $user_id) {
        $role = New Role;
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request;
        $user->password = bcrypt('password');
        $user->save();
        return response()->json($user);
    }

    public function deleteuser($user_id) {
        $user = User::destroy($user_id);
        return response()->json($user);
    }
}
