<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banners = Banner::all();
        return view('Admin.banner',['banners'=>$banners]);
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
        //updating banner details
        if($request->id){
            $banner = Banner::find($request->id);
            $banner->title = $request->title;
            if($request->hasFile('image')){

                $file_type = $request->file('image')->extension();
                $filename = time().".".$file_type;
                $image_path = public_path("banners/");
                if($banner->image != null){
                    unlink($image_path.$banner->image);
                }
                
                $request->file('image')->move(public_path('banners/'), time() . '.' . $file_type);
                $banner->image = $filename;
            }
            if($request->status != ""){
                $banner->status = $request->status;
            }
            else{
                $banner->status = 0;
            }
            $banner->save();
            return redirect('/banner')->with('message', 'Successfully updated banne details!');
        }

        // insering new banner:
        else{

            $banner = new Banner();
            $banner->title = $request->title;
            
            if ($request->hasFile('image')) {
                $file_type = $request->file('image')->extension();
                $filename = time().".".$file_type;
                $image_path = public_path("banners/");
                $request->file('image')->move(public_path('banners/'), time() . '.' . $file_type);
                $banner->image = $filename;
            }
            if($request->status != ""){
                $banner->status = $request->status;
            }
            else{
                $banner->status = 0;
            }
            $banner->save();
            return redirect('/banner')->with('message', 'Successfully banner added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }

    public function new_banner(){

        return view('Admin.new_banner');
    }

    public function banner_status($id){
        $banner = Banner::find($id);

        if($banner->status == 1){
            $banner->status = 0;
        }
        else{
            $banner->status = 1;
        }
        $banner->save();
        return back();
    }

    public function view_banner($id){
        $banner = Banner::find($id);
        return view('Admin.banner_view',['banner'=>$banner]);
    }
    public function banner_edit($id){
        
        $banner = Banner::find($id);
        return view('Admin.banner_edit',['banner'=>$banner]);
    }

    // delete banner function
    public function delete_banner($id){
        $banner = Banner::find($id);
        $banner->delete();
        $filePath = public_path('banners/'.$banner->image);
        File::delete($filePath);

        return back()->with('message', 'successfully banner deleted!');
    }



    public function updatedBanner(Request $request){

    }
}
