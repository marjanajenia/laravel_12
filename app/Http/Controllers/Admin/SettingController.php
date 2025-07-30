<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function index(){
        return view('backend.layouts.setting.setting');
    }
    public function debug()
    {
        if(env('APP_DEBUG') == true ){
            $envcontent = str_replace('APP_DEBUG=true', 'APP_DEBUG=false', file_get_contents(base_path('.env')));
        }else{
            $envcontent = str_replace('APP_DEBUG=false', 'APP_DEBUG=true', file_get_contents(base_path('.env')));
        }

        file_put_contents(base_path('.env'), $envcontent);

        Artisan::call('config:clear');

        return response()->json([
            'status' => 'success',
            'message' => 'Your action was Successful',
        ], 200);
    }
}
