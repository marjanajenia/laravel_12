<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles= Role::orderBy('id', 'desc')->get();
        return view('backend.layouts.access.roles.index', ['roles' => $roles]);
    }
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
    public function edit($id){
        $role = Role::find($id);
        return view('backend.layouts.access.roles.edit',[
            'role' => $role,
            'permissions' => Permission::get(),
        ]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);
        try{
            $role = Role::find($id);
            $role->update(['name' => $request->name]);
            $role->syncPermissions($request->permissions);
            return redirect()->route('roles.index')->with('success', 'Role Uploaded successfully');
        }catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function destroy($id){
        try{
            $role = Role::find($id);
            $role->delete();
            return redirect()->back()->with('success', 'Role deleted successfully');
        }catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
