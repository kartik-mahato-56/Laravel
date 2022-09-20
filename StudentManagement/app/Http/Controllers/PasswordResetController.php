<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Carbon\CarbonConverterInterface;
use Illuminate\Auth\Passwords\PasswordResetServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Mail\Message;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    //

    public function send_password_reset_mail(Request $request){
        $request->validate([
            "email" => "required|email"
        ]);
        $email = $request->email;
        // check whether email exist or not
        $user = User::where('email',$email)->first();
        if(!$user){
            return response([
                'status'=>"failed",
                "message" => "No acount found registered with this email"
            ],404);
        }

        // generating password reset token
        $token = Str::random(30);

        // saving this token to pasword_reset tabl temporarily
        PasswordReset::create([
            'email'=>$email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('reset',['token'=>$token],function ($message) use ($email) {
            $message->subject('Password Reset Link');
            $message->to($email);
        });

        return response([
            'status'=>"password reset link has been sent to your registered email id. please check it"
        ]);
    }   

    public function resetPassword(Request $request, $token){

        
        // validating the token when it will be expired automatically
        $formatted = Carbon::now()->subMinute(5)->toDateTimeString();
        PasswordReset::where('created_at','<=', $formatted)->delete();
        
        $request->validate([
            'password'=>'required|confirmed'
        ]);

        $passwordReset = PasswordReset::where('token', $token)->first();
        // checking whether password reset token is valid or not
        if(!$passwordReset){
            return response([
                'status'=>"failed!",
                'message' => "Invalid token or expired"
            ],404);
        }
        // find the user with the specific email and updating their password
        $user = User::where('email', $passwordReset->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        
        // deleting the token after successfull password changed
        PasswordReset::where('email', $passwordReset->email)->delete();
        return response([
            'status' => "success",
            'message' => "successfully changed password"
        ],200);
    }
}
