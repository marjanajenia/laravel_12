<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
    public function update(Request $request): RedirectResponse{
        $request->validate([
            'mail_mailer'       => 'nullable|string',
            'mail_host'         => 'nullable|string',
            'mail_port'         => 'nullable|string',
            'mail_username'     => 'nullable|string',
            'mail_password'     => 'nullable|string',
            'mail_encryption'   => 'nullable|string',
            'mail_from_address' => 'nullable|string',
        ]);

        try {
            $envContent = File::get(base_path('.env'));
            $lineBreak  = "\n";
            $envContent = preg_replace([
                '/MAIL_MAILER=(.*)\s*/',
                '/MAIL_HOST=(.*)\s*/',
                '/MAIL_PORT=(.*)\s*/',
                '/MAIL_USERNAME=(.*)\s*/',
                '/MAIL_PASSWORD=(.*)\s*/',
                '/MAIL_ENCRYPTION=(.*)\s*/',
                '/MAIL_FROM_ADDRESS=(.*)\s*/',
            ], [
                'MAIL_MAILER=' . $request->mail_mailer . $lineBreak,
                'MAIL_HOST=' . $request->mail_host . $lineBreak,
                'MAIL_PORT=' . $request->mail_port . $lineBreak,
                'MAIL_USERNAME=' . $request->mail_username . $lineBreak,
                'MAIL_PASSWORD=' . $request->mail_password . $lineBreak,
                'MAIL_ENCRYPTION=' . $request->mail_encryption . $lineBreak,
                'MAIL_FROM_ADDRESS=' . '"' . $request->mail_from_address . '"' . $lineBreak,
            ], $envContent);

            File::put(base_path('.env'), $envContent);

            return back()->with('success', 'Updated successfully');
        } catch (Exception) {
            return back()->with('error', 'Failed to update');
        }
    }
}
