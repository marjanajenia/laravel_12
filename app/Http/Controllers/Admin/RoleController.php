<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function create(){
        return view('backend.layouts.access.roles.create', ['permissions' => Permission::all()]);
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'permissions' => 'required',
        ]);
        try {
            $role = Role::create(['name' => $request->name]);
            $role->syncPermissions($request->permissions);
            return redirect()->route('dashboard')->with('t-success', 'Role created t-successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('t-error', $exception->getMessage());
        }
    }
}
