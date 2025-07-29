<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSettingController extends Controller
{
    public function sendMail(){
        try{
            $toEmailAddress = "hr@gmail.com";
            $welcomeMail = "hey welcome";
            $response = Mail::to($toEmailAddress)->send(new TestMail($welcomeMail));
            dd($response);
        }catch(Exception $e){
            \Log::error('unable to send message' . $e->getMessage());
        }
    }
}
