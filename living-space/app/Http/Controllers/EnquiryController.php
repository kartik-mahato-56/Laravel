<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {
        //
    }

    public function enquiry(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=> 'required', // | unique:enquiries,email',
                'phone' => 'required'
            ]
        );
        $data = new Enquiry();
        $data->name = $request->name;
        $data ->email = $request->email;
        $data->phone = $request->phone;
        $data->message = $request->message;
       
        $data->save();
        
        $content = "<html>";
        $content .= "<head>";
        $content .= "<title>Confirmation Email</title>";
        $content .= "</head>";

        $content .= "<body>";
        $content .= "<h5>Thank you for contacting us, Someone from our team will surely contact you as soon as posssible</h5>";
        $content .= "<h5>Thank You!<br>Team Living space<h5>";
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

        return view('thankyou');
   }
}
// "image"=>'image | required | mimes:jpeg,png,jpg,gif,svg | max:2048',

// image upload code
/*

if ($request->hasFile('profile_image')) {
      $file_type = $request->file('profile_image')->extension();
      $file_path = $request->file('profile_image')->storeAs('images/doctors', time() . '.' . $file_type, 'public');
      $request->file('profile_image')->move(public_path('images/doctors'), time() . '.' . $file_type);
    }

*/


/*

laravel admin pannel
https://www.mgtechnologies.co.in/product/cooladmin-dashboard-template
*/

