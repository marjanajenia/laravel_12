<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileSettingController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('backend.layouts.setting.profile_setting', compact('user'));
    }
    public function updateProfile(Request $request){
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' .auth()->user()->id,
        ]);

        $user = User::find(auth()->user()->id);

        User::where('id', $user->id)->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->back()->with('success', 'Profile Update Successfully');
    }
    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = Auth::user();
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Password updated successfully');
        } else {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }
    }
    public function updatePicture(Request $request){

        try{
             $request->validate([
                'profile_picture' => 'required|image|mimes:png,jpg,gif,jpeg|max:10240',
            ]);

            $user = Auth::user();

            if ($user->avatar && File::exists(public_path($user->avatar))) {
                File::delete(public_path($user->avatar));
            }

            if ($request->hasFile('profile_picture')) {
                $image                        = $request->file('profile_picture');
                $imageName                    = uploadImage($image, 'users');
                $user->avatar = $imageName;
                $user->save();
            }

            return response()->json([
                'success'   => true,
                'image_url' => asset($user->avatar),
            ]);
        }catch (Exception $e) {
             \Log::error('Profile picture upload failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);

        }
    }
}
