<?php

namespace App\Http\Controllers;

use App\Models\FeaturedProduct;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FeaturedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = FeaturedProduct::all();
        return view('Admin.featured_products',['products'=>$products]);
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
        $product = new FeaturedProduct();
        $product->title = $request->title;

        if ($request->hasFile('image')) {
            $file_type = $request->file('image')->extension();
            $filename = time().".".$file_type;
            $image_path = public_path("products/");
            $request->file('image')->move(public_path('products/'), time() . '.' . $file_type);
            $product->image = $filename;
        }
        if($request->status != ""){
            $product->status = $request->status;
        }
        else{
            $product->status = 0;
        }
        $product->save();
        return redirect('/featured-products')->with('message', 'Successfully product added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeaturedProduct  $featuredProduct
     * @return \Illuminate\Http\Response
     */
    public function show(FeaturedProduct $featuredProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeaturedProduct  $featuredProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(FeaturedProduct $featuredProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeaturedProduct  $featuredProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeaturedProduct $featuredProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeaturedProduct  $featuredProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeaturedProduct $featuredProduct,$id){
        $product = FeaturedProduct::find($id);

        $filePath = public_path('products/'.$product->image);
        $product->delete();
        File::delete($filePath);

        return redirect('/featured-products')->with('message','Successfully deleted');

    }


    public function new_featured_products(){

        return view('Admin.new_featured_products');
    }
    
    //update status for featured products:
    public function updateProductStatus($id){
        $product = FeaturedProduct::find($id);

        // updating status
        if($product->status == 1){
            $product->status = 0;
        }else{
            $product->status = 1;
        }
        $product->save();
        return back();
    }

    // show-product
    public function showProduct($id){
        $product = FeaturedProduct::find($id);

        return view('Admin.show-product',['product'=>$product]);
    }

   
}
