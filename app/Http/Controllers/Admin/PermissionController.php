<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        return view('backend.layouts.access.permissions.index',[
            'permissions' => Permission::orderBy('id', 'desc')->get(),
        ]);
    }
    public function create(){
        return view('backend.layouts.access.permissions.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:permissions,name',
            'guard_name' => 'required|in:web,api'
        ]);
        Permission::create([
            'name'       => $request->name,
            'guard_name' => $request->guard_name,
        ]);
        return redirect()->route('permissions.index');
    }
    public function edit($id){
        $permission = Permission::find($id);
        return view('backend.layouts.access.permissions.edit',['permission' => $permission]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:permissions,name,'.$id,
            'guard_name' => 'required|in:web,api'
        ]);
        $permission = Permission::find($id);
        $permission->update([
            'name'       => $request->name,
            'guard_name' => $request->guard_name,
        ]);
        return redirect()->route('permissions.index');
    }
    public function destroy($id){
        try{
            $permission = Permission::find($id);
            $permission->delete();
            return redirect()->back()->with('success', 'Permission deleted successfully');
        }catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
