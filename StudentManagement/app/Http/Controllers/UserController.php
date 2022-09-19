<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    public function register(Request $request){
        $request->validate([
            'name' => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed",


        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);

        $token = $user->createToken('mytoken')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token
        ],201);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        
        return response()->json(['status'=>"successfully logged out!"]);
    
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password' => "required"
        ]);
        $user = User::where('email', $request->email)->first();

        if(!is_null($user)){
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken('mytoken')->plainTextToken;
                return response()->json([
                    'result' => "successfully logged in",
                    'token' => $token
                ],200);
            }
            else{
                return response()->json(["result"=>"invalid credentials!"],401);
            }
        }
        else{
            return response()->json([
                "result"=> "you haven't registered yet!"
            ],404);
        }
    }
}
