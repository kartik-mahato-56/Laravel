<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\RequestStack;

class UserController extends Controller
{
    //

   
    public function view(){
        $users = User::all();
        if(!is_null($users)){
            return response()->json(['status'=>'success', 'data'=>$users]);
        }else{
            return response()->json(['status'=>"no data found"]);
        }
    }
    public function register(Request $request){
        
        $validation = Validator::make($request->all(),[
            'name'=> "required",
            'email'=> 'required|unique:users',
            'password' => "required"
        ]);
        if($validation->fails()){
            $errors = $validation->errors();
            return response()->json(['errors'=>$errors],403);
        }
        else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            if($user->save()){
                return response()->json(['result'=>"success", 'data'=>$user],200);
            }
            else{
                return response()->json(['result' => "something error"]);
            }
        }
    }

    public function login(Request $request){
        
    }

    public function search($email){
        $user = User::where('email', $email)->first();
        if(!is_null($user)){
            return response()->json(['status'=>'success','data'=>$user]);
        }else{
            return response()->json(['status'=>'no data found']);
        }
    }

    public function update(Request $request){

        $validation = Validator::make($request->all(),[
            'email' => 'required|exists:users,email',
            'name' => 'required'
        ]);
        if($validation->fails()){
            $errors = $validation->errors();
            return response()->json(['error'=>$errors]);
        }else{
            $user = User::where('email', $request->email)->first();
            $user->name = $request->name;
            $user->update();
            if($user->update()){
                return response()->json(['status'=>'successfully updated user details', 'updated data'=> $user],200);
            }else{
                return response()->json(['status','something error']);
            }

        }
    }
}
