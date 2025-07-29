<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSettingController extends Controller
{
    // public function sendMail(){
    //     try{
    //         $toEmailAddress = "hr@gmail.com";
    //         $welcomeMail = "hey welcome";
    //         $response = Mail::to($toEmailAddress)->send(new TestMail($welcomeMail));
    //         dd($response);
    //     }catch(Exception $e){
    //         \Log::error('unable to send message' . $e->getMessage());
    //     }
    // }
    public function index(){
        return view('backend.layouts.setting.mail_setting');
    }
    public function send(Request $request){

        $request->validate([
            'receiver' => 'required|email|max:100',
            'subject'  => 'required|string|max:100',
            'mail_body'  => 'required|string|max:1000',
        ]);

        try{
            $receiver = $request->receiver;
            $subject  = $request->subject;
            $content = $request->mail_body;

            Mail::to($receiver)->send(new TestMail($subject, $content));
            
            return back()->with('t-success', 'Mail sent successfully');
        } catch (Exception $e) {
            return back()->with('t-error', $e->getMessage());
        }
    }
}
