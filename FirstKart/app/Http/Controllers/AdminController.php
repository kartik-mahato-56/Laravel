<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('admin.login');
    }
    public function adminAuth(Request $request){
        $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);
        $admin = Admin::where('email', "=", $request->email)->first();
        if ($admin) {

            if (Hash::check($request->password, $admin->password)) {
                $request->session()->put('ADMIN_ID', $admin->id);
                $request->session()->put('ADMIN_LOGIN', true);
                return redirect('/dashboard');
            } else {
                return back()->with('error', 'Invalid credentilas!');
            }
        } else {
            return back()->with('error', 'User not registered, please click on create account to register');
        }
    }
    public function registerFormLoad(){
        return view('admin.register');
    }

    public function registerAuth(Request $request){
         $request->validate([
            'name' => "required",
            "email" => "required|unique:admins",
            'password' => "required|confirmed"
         ]);
         $admin = new Admin();
         $admin->name = $request->name;
         $admin->email = $request->email;
         $admin->password = Hash::make($request->password);
         $admin->save();
         return redirect('admin_login')->with('message', 'successfully registred, now you can login with your credentials!');

    }

    public function loadDashboard(){
        return View('admin.dashboard');
    }
 
}
