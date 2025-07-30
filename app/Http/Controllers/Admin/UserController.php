<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Notifications\NewUserRegistered;

class UserController extends Controller
{
    public function index(){
        $user = Auth::guard('web')->user();
        $users = User::where('id', '!=', $user->id)->with('roles')->orderBy('id', 'desc')->get();
        return view('backend.layouts.access.user.index', ['users' => $users]);
    }
    public function create(){
        return view('backend.layouts.access.user.create',[
            'roles' => Role::all(),
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role'     => 'required|array',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole($request->role);

        $admin = User::role('admin')->first();
        $admin->notify(new NewUserRegistered($user));

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }
    public function edit($id){

        $user = User::find($id);
        $roles = Role::all();
        return view('backend.layouts.access.user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role'  => 'required|array',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
        ]);
        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    public function destroy($id){
        try{
            $user = User::find($id);
            $user->delete();

            return redirect()->back()->with('success', 'User deleted successfully');

        }catch(Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function show($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.layouts.access.user.show', compact('user', 'roles'));
    }

    public function markAsRead(Request $request)
    {
        $notification = auth()->user()->notifications()->find($request->id);
        if ($notification) {
            $notification->markAsRead();
        }
        return response()->json([
            'status' => 'success',
            'message' => 'notification clear',
        ]);
    }
}

