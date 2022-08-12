<?php

namespace App\Http\Controllers;

// use App\Models\Enquiry;
use App\Models\Test;
use Illuminate\Http\Request;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;


use function Ramsey\Uuid\v1;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //\
        return view('index');
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
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }

   public function aboutUs(){
    return view('about-us');

   }
   public function livingRoom(){
    return view('living-room');
   }

   public function diningRoom(){
    return view('dining-room');
   }

   public function bedRoom(){
    return view('bed-room');
   }

   public function kitchen(){
    return view('kitchen');
   }
   public function showRoom(){
    return view('showroom-interior');
   }

   public function hotelRestaurant(){
    return view('hotel-restaurant');
   }

   public function corporateOffice(){
    return view('corporate-office');
   }

   public function customerStories(){
    return view('customer-stories');
   }


   public function contact(){
    return view('contact');
   }

   public function termAndCondition(){
    return view('terms-conditions');
   }

}
