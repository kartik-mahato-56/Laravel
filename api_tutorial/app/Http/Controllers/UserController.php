<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //\


    public function testing(){
        return ["name"=>"kartik"];
    }
    public function getData(){
        $data = User::all();
        return ['result' => $data];
    }

    public function postData(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if($user->save()){
            return ['status' =>"success"];
        }else{
            return ['status'=>"something error"];
        }
    }

    public function searchData(Request $request){
        $user = User::where('email', $request->email)->first();
        return ['result'=>$user];
        // if($user){
        //     return ['result'=>$user];
        // }

        // ele{
        //     return ['result'=>"no data found"];
        // }
    }
}
