<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        return view('backend.layouts.access.user.create');
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
        // dd($request->all());
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole($request->role);

        return redirect()->route('users.index');
    }
}
