<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeUnit\FunctionUnit;

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
        return view('Admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $admin = new Admin();
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect('/admin')->with('message', 'successfully registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function register(){
        return view('Admin.register');
    }
   
    public function login(Request $request){
        $request->validate([
            'email'=> 'email|required',
            'password'=>'required',
        ]);
        $admin = Admin::where('email',"=",$request->email)->first();
        if($admin){
            
            if(Hash::check($request->password, $admin->password)){
                $request->session()->put('ADMIN_ID',$admin->id);
                $request->session()->put('ADMIN_LOGIN',true);
                return redirect('/dashboard');
            }
            else{
                return back()->with('error', 'Invalid email or pasword');
            }
            
        }
        else{
            return back()->with('error', 'User not registered, please click on sign up to register');
        }
    }

    public function dashboard(Request $request){
        return view('Admin.dashboard');
    }
    public function forgetPassword(){
        return view('Admin.forget-pass');
    }
    public function chartLoad(){
        return view('Admin.chart');
    }
    public function tableShow(){
        return view('Admin.table');
    }
    public function loadForm(){
        return view('Admin.form');
    }
    public function mapLoad(){
        return view('Admin.map');
    }

    public function logout(){
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_LOGIN');
        return redirect('/admin');
    }
}
