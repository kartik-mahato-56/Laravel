<?php

namespace App\Http\Controllers;

// use App\Models\Enquiry;

use App\Models\Banner;
use App\Models\FeaturedProduct;
use App\Models\MenuBar;
use App\Models\Test;
use Illuminate\Http\Request;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;
use App\Models\Page;
use App\Models\SubMenu;
use Illuminate\Support\Facades\DB;

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
        $products = FeaturedProduct::where('status','=',1)->get();
        $banners = Banner::where('status','=',1)->get();
        return view('index',['banners'=>$banners, 'products'=>$products]);
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

    public function pageLoad($slug){

        // $pageData = MenuBar::where('slug', $slug)->get();
        
        // if(!$pageData){
            
        //     return view('Admin.page_load',['pageData'=>$pageData]);  
        // }else{

        //     $pageData = SubMenu::where('slug', $slug)->get();
            
        //     return view('Admin.page_load',['pageData'=>$pageData]);
        // }
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

}
