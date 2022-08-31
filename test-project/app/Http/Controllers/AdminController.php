<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Banner;
use App\Models\Enquiry;
use App\Models\FeaturedProduct;
use App\Models\Image;
use App\Models\MainMenu;
use App\Models\Page;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeUnit\FunctionUnit;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\FuncCall;

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

    public function image(){
        echo "helo";
        die;
        // return view('Admin.image');
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
        $request->validate([
            'username'=>'required',
            "email" =>"email|required | unique:admins",
            'password' => 'required',
        ]);
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
                return back()->with('error', 'Invalid email or password');
            }

        }
        else{
            return back()->with('error', 'User not registered, please click on sign up to register');
        }
    }

    public function dashboard(Request $request){

        $banner = Banner::where('status','=',1)->count();
        $product = FeaturedProduct::where('status','=',1)->count();
        $enquiry = Enquiry::where('status','=',0)->count();
        $page= Page::where('status','=',1)->count();
        

        return view('Admin.dashboard',['banner'=>$banner,'enquiry'=>$enquiry,'product'=>$product,'page'=>$page]);
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

    public function account(){
        return view('Admin.account');
    }

    public function logout(){
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_LOGIN');
        return redirect('/admin');
    }

    public function update_details(Request $request){

        if($request->id){
            $user = Admin::find($request->id);

            if ($request->hasFile('profile_pic')) {
                $file_type = $request->file('profile_pic')->extension();
                $filename = time().".".$file_type;
                $image_path = public_path("users/");
                if($user->profile_pic != null){
                    unlink($image_path.$user->profile_pic);
                }
                    $request->file('profile_pic')->move(public_path('users/'), time() . '.' . $file_type);
                    $user->profile_pic = $filename;

            }
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;


            $user->save();
            return back()->with('message', "successfully updated user detail");
        }
    }

    public function forgetPassword_(Request $request){

        $otp = random_int(111111,999999);
        $request->session()->put('otp',$otp);
        $content = "<html>";
        $content .= "<head>";
        $content .= "<title>Confirmation Email</title>";
        $content .= "</head>";

        $content .= "<body>";
        $content .= "<h5>Your OTP for password reset is:</h5>";

      $content .=  $otp;
        //   $content .= "<p>" . $user->otp . "</p>";


        $content .= "</body>";

        $content .= "</html>";

        $mailTo = $request->email;

        Mail::send(array(), array(), function ($message) use ($content, $mailTo) {
            $message->to($mailTo)
            ->subject('Password Reset OTP')
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->setBody($content, 'text/html');
        });

        return redirect('/otp_verification');
    }


    public function otp_verification(){

        return view('Admin.otp_verify');
    }

    public function loadChangePassword(){
        return view('Admin.change_password');
    }

    public function changePassword(Request $request){
        // getting uuser all informatuion
        $user = Admin::find($request->id);

        if($request->old_password != ""){
            $request->validate([
                'new_password' => 'required',
                // 'confirm_password' => 'required|confirmed'
            ]);
            if(Hash::check($request->old_password, $user->password)){
                if(!Hash::check($request->new_password, $user->password)){
                    $user->password = Hash::make($request->new_password);
                    $user->save();
                    return redirect('/account')->with('password_changed', "password changed successfully.");
                }
                else{
                    return back()->with('pass_matched', "New password must be different from old password   ");
                }

            }
            else{
                return back()->with('wrong_pass', "please enter your correct password");
            }
        }
        else{
            return back()->with('old_pass_required', "please enter your old password");
        }


    }


    public function enquiries(){

        $enquiries = DB::table('enquiries')->orderByDesc('enquiries.id')->get();
        return view('Admin.enquiries',['enquiries'=>$enquiries]);
    }

    public function replyEnquiryLoad($id){
        $enquiry = Enquiry::find($id);

        return view('Admin.reply_enquiry',['enquiry'=>$enquiry]);
    }

    public function replyEnquirySubmit(Request $request){

        $enquiryReply = Enquiry::find($request->id);

        $enquiryReply->name = $request->name;
        $enquiryReply->email = $request->email;
        $enquiryReply->message = $request->enquiry_message;
        $enquiryReply->reply_message = $request->reply_message;
        $enquiryReply->status = 1;

        $enquiryReply->save();

        // sending mail to the receiever
        $content = "<html>";
        $content .= "<head>";
        $content .= "<title>Confirmation Email</title>";
        $content .= "</head>";

        $content .= "<body>";
        $content .= "<h5>". $request->reply_message ."</h5>";
        //   $content .= "<p>" . $user->otp . "</p>";


        $content .= "</body>";

        $content .= "</html>";

        $mailTo = $request->email;
        Mail::send(array(), array(), function ($message) use ($content, $mailTo) {
            $message->to($mailTo)
            ->subject('Enquiry Confirmation')
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->setBody($content, 'text/html');
        });


        return redirect('/enquiries')->with('message', 'successfully replied!');
    }



    // Enquiry search by date
    public function enquirySearch(Request $request){

        // echo $request->todate;
        // echo $request->fromdate;
        // die;
        if($request->status != ""){
            $enquiries = Enquiry::where('status',$request->status)->get();
            return view('Admin.enquiries',['enquiries'=>$enquiries]);
        }
        // else if($request->status != "" && ($request->fromdate != "" && $request->todate != "")){
        //     $request->validate([
        //         'fromdate' => "required|date",
        //         "todate" => "required|date|after:fromdate"
        //     ]);
        
        //     $enquiries = Enquiry::where('status',$request->status)->get();
        //     $enquiries = $enquiries->whereBetween('created_at',[$request->fromdate, $request->todate])->get();
        //     return view('Admin.enquiries',['enquiries'=>$enquiries]);
        // }
        else if($request->fromdate != "" && $request->todate != ""){
            $request->validate([
                'fromdate' => "required|date",
                "todate" => "required|date| after:fromdate"
            ]);
            $enquiries = Enquiry::whereBetween('created_at',[$request->fromdate, $request->todate])->get();

        }
        
        else{
            $enquiries = DB::table('enquiries')->orderByDesc('enquiries.id')->get();
        }
        return view('Admin.enquiries',['enquiries'=>$enquiries]);
    }




    public function reply_enquiry_show($id){
        $enquiry = Enquiry::find($id);
        return view('Admin.view_reply_enquiry',['enquiry'=>$enquiry]);
    }


    public function delete_enquiry($id){
        $enquiry = Enquiry::find($id);
        $enquiry->delete();

        return redirect('/enquiries')->with('message', 'enquiry delete successfully');
    }


    // functions for main and sub menues
    public function addMainMenu(){
        return view('Admin.new_menu');
    }
    public function new_menu_submit(Request $request){
        $request->validate([
            'name'=>'required|unique:main_menus',
            'slug' =>'required|unique:main_menus'
        ]);
        $mainMenu = new MainMenu();
        $mainMenu->name = $request->name;
        $mainMenu->slug = $request->slug;
        $mainMenu->sub_menu = $request->sub_menu;

        $mainMenu->save();

        return back()->with('status', 'successfully addes main menu');

    }
    public function listMainMenu(){
        $mainMenu = MainMenu::all();

        return view('Admin.main_menu_list', ['mainMenu'=>$mainMenu]);
    }



    public function addSubMenu(){
        $mainMenu = MainMenu::where('sub_menu',1)->get();
        return view('Admin.add_sub_menu',['mainMenu'=>$mainMenu]);
    }

    public function submitSubMenu(Request $request){
        $request->validate([
            'name' => 'required|unique:sub_menus',
            'slug' => 'required|unique:sub_menus'
        ]);
        $subMenu = new SubMenu();
        $subMenu->name = $request->name;
        $subMenu->parent_menu = $request->parent_menu;
        $subMenu ->slug = $request->slug;

        $subMenu->save();

        return back()->with('status', 'successfully added sub menu');

    }

    public function listSubMenu(){

        $subMenu = SubMenu::all();
        return view('Admin.sub_menu_list',['subMenu'=>$subMenu]);
    }



    // pages functions
    public function addPage(){
        $mainMenu['mainMenu'] = MainMenu::where('sub_menu',0)->get();
        $subMenu['subMenu'] = SubMenu::where('status',1)->get();

        $slugs = array_merge($mainMenu,$subMenu);
        
        return view('Admin.add_page',['slugs'=>$slugs]);
    }

    public function addPageSubmit(Request $request){
        $request->validate([
            'slug' => 'required|unique:pages'
        ]);
        $page = new Page();
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->description = $request->description;
        $page->save();

        return back()->with('status', 'successfully page addded');
    }



    // image function:
    public function newImage(){

        

        $pages = Page::all();
        return view('Admin.add_image',['pages'=>$pages]);
    }

    public function submitImage(Request $request){
        $request->validate([
            'category' => 'required',
            'image' => 'required'
        ]);
        if(Image::where('category', $request->category)->first() != ""){
            $pageImage = Image::where('category', $request->category)->first();
          
            if($request->hasfile('image'))
                {
                  foreach ($request->file('image') as  $value) {
                      $file_type =$value->extension();
                      $filename = uniqid().".".$file_type;
                      $value->move(public_path('Gallery/'),$filename);
                      $galley_image[] = $filename;
                  }
                  $pageImage->image .= ','. implode(',',$galley_image);
                  
                }
            $pageImage->save();
            return back()->with('status', 'suuccessfully added page image');
        }
        else{
            $pageImage = new Image();
            $pageImage->category = $request->category;
            if($request->hasfile('image')){
                
                foreach ($request->file('image') as  $value) {
                    $file_type =$value->extension();
                    $filename = uniqid().".".$file_type;
                    $value->move(public_path('Gallery/'),$filename);
                    $galley_image[] = $filename;
                }
                $pageImage->image =  implode(',',$galley_image);
                
            }
            $pageImage->save();
            return back()->with('status', 'suuccessfully added page image');
        }
    }
}
