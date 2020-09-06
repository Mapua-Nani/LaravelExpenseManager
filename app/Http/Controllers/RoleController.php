<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('role')->with('roles', $roles);
    }

    public function addrole(Request $request) {
        $role = Role::create($request->all());
        return response()->json($role);
    }

    public function editrole($role_id) {
        $role = Role::find($role_id);
        return response()->json($role);
    }

    public function updaterole(Request $request, $role_id) {
        $role = Role::find($role_id);
        $role->title = $request->title;
        $role->description = $request->description;
        $role->save();
        return response()->json($role);
    }

    public function deleterole($role_id) {
        $role = Role::destroy($role_id);
        return response()->json($role);
    }
    //populate select
    public function getrole() {
        $roles = Role::select('id','title')->get();
        return response($roles);
    }
}
