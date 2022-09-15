<?php

namespace App\Http\Controllers;

use App\Models\MainMenu;
use App\Models\PageImage;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class PageController extends Controller
{
    //

    public function listMainPage(){

        $mainPages = MainMenu::all();
        return view('Admin.main_page_list',['mainPages'=>$mainPages]);
    }

    public function newMainPage(){

        return view('Admin.new_main_menu');
    }

    public function newMainPageSubmit(Request $request){
        $request->validate([
            'name' => 'required|unique:main_menus'
        ]);
        $newMainPage = new MainMenu();

        $newMainPage->name = $request->name;
        $newMainPage->slug = Str::slug($request->name,'_');

        $newMainPage->save();
        return redirect('/main_page_list')->with('message', 'successfully added main page');
    }

    public function listSubPages(){
        $subPages = SubMenu::orderBy('parent_menu_id','asc')->get();
        return view('Admin.sub_page_list',['subPages' =>$subPages]);
    }

    public function newSubPage(){

        $mainPage = MainMenu::all();
        return view('Admin.add_sub_menu',['mainPage' => $mainPage]);
    }

    public function subPageSubmit(Request $request){

        $request->validate([
            'name' => 'required|unique:sub_menus'
        ]);
        $newSubPage = new SubMenu();

        $newSubPage->name = $request->name;
        $newSubPage->slug = Str::slug($request->name,'_');
        $newSubPage->parent_menu_id = $request->parent_page;

        $newSubPage->save();

        // updating main page sub_menu field status.
        $mainPage = MainMenu::find($request->parent_page);
        if($mainPage->sub_menu_status == 0){
            $mainPage->sub_menu_status = 1;
        }
        $mainPage->save();
        return redirect('sub_page_list')->with('message', 'successfully added sub page');
    }

    public function pageDetails(){
        $mainPage = MainMenu::all();
        return view('Admin.page_details',['mainPage' =>$mainPage]);
    }
    public function getsubpage(Request $request)
    {
        $mainPage = MainMenu::where('id',$request->mainPageId)->first();
        $subpage = SubMenu::where('parent_menu_id', $request->mainPageId)->get();

        $pageImage = PageImage::where('page_slug', $mainPage->slug)->first();


        return response()->json(['subpage' => $subpage, 'mainPage' => $mainPage, 'pageImage' => $pageImage]);
    }

    // edit page detauils or enter new page detais here
    public function pageDetailsSubmit(Request $request){

        // updating mainpage or enter new details to a new main page
        if($request->subPageId == ""){
            $pageDetails = MainMenu::find($request->mainPageId);
            $pageDetails->description =$request->description;
            if($request->imageIndex !=""){
                $request->validate([
                    'images' => "required"
                ]);

                if(sizeof($request->imageIndex) >= sizeof($request->images)){
                    $pageImage = PageImage::where('page_slug', $pageDetails->slug)->first();
                    $images = explode(',', $pageImage->images);
                    foreach($request->file('images') as $key=>$value){
                        unlink('Gallery/'.$images[$request->imageIndex[$key]]);
                        $file_type = $value->extension();
                        $filename = uniqid().'.'.$file_type;
                        $value->move(public_path('Gallery/'),$filename);
                        $images[$request->imageIndex[$key]] = $filename;
                    }
                    $pageImage->images = implode(',',$images);
                    $pageImage->save();
                }

                // number of uploaded pictures are greater than the number of selectd pictires
                else if(sizeof($request->imageIndex) < sizeof($request->images)){
                    $pageImage = PageImage::where('page_slug', $pageDetails->slug)->first();
                    $images = explode(',', $pageImage->images);
                    foreach($request->file('images') as $key=>$value){
                        if(sizeof($request->imageIndex) > $key){
                            unlink('Gallery/'.$images[$request->imageIndex[$key]]);
                            $file_type = $value->extension();
                            $filename = uniqid().'.'.$file_type;
                            $value->move(public_path('Gallery/'),$filename);
                            $images[$request->imageIndex[$key]] = $filename;
                        }
                        else{
                            $file_type = $value->extension();
                            $filename = uniqid().'.'.$file_type;
                            $value->move(public_path('Gallery/'),$filename);
                            array_push($images, $filename);
                        }
                    }
                    $pageImage->images = implode(',', $images);
                    $pageImage->save();

                }
            }
            else if($request->hasFile('images')){
                $image =  PageImage::where('page_slug', $pageDetails->slug)->first();
                if($image == ""){
                    $image = new PageImage();
                }

                foreach($request->file('images') as  $value) {
                    $file_type =$value->extension();
                    $filename = uniqid().".".$file_type;
                    $value->move(public_path('Gallery/'),$filename);

                    $pageImage[] = $filename;
                }
                if($image->images == "" ){
                    $image->images = implode(',',$pageImage);
                }else{
                    $image->images .= ','. implode(',', $pageImage);
                }

                $image->page_slug = $pageDetails->slug;
                $image->save();
            }

            $pageDetails->save();
            return back()->with('status', 'successfully updated page details');
        }

        // updating or adding details to the submenu;

        else{

            $pageDetails =SubMenu::find($request->subPageId);
            $pageDetails->description =$request->description;
            if($request->imageIndex !=""){
                $request->validate([
                    'images' => "required"
                ]);

                if(sizeof($request->imageIndex) >= sizeof($request->images)){
                    $pageImage = PageImage::where('page_slug', $pageDetails->slug)->first();
                    $images = explode(',', $pageImage->images);
                    foreach($request->file('images') as $key=>$value){
                        unlink('Gallery/'.$images[$request->imageIndex[$key]]);
                        $file_type = $value->extension();
                        $filename = uniqid().'.'.$file_type;
                        $value->move(public_path('Gallery/'),$filename);
                        $images[$request->imageIndex[$key]] = $filename;
                    }
                    $pageImage->images = implode(',',$images);
                    $pageImage->save();
                }
            //    when more images uploaded than selected images
                else if(sizeof($request->imageIndex) < sizeof($request->images)){
                    $pageImage = PageImage::where('page_slug', $pageDetails->slug)->first();
                    $images = explode(',', $pageImage->images);
                    foreach($request->file('images') as $key=>$value){
                        if(sizeof($request->imageIndex) > $key){
                            unlink('Gallery/'.$images[$request->imageIndex[$key]]);
                            $file_type = $value->extension();
                            $filename = uniqid().'.'.$file_type;
                            $value->move(public_path('Gallery/'),$filename);
                            $images[$request->imageIndex[$key]] = $filename;
                        }
                        else{
                            $file_type = $value->extension();
                            $filename = uniqid().'.'.$file_type;
                            $value->move(public_path('Gallery/'),$filename);
                            array_push($images, $filename);
                        }
                    }
                    $pageImage->images = implode(',', $images);
                    $pageImage->save();

                }
            }
            else if($request->hasFile('images')){
                $image =  PageImage::where('page_slug', $pageDetails->slug)->first();
                if($image == ""){
                    $image = new PageImage();
                }
                foreach($request->file('images') as  $value) {
                    $file_type =$value->extension();
                    $filename = uniqid().".".$file_type;
                    $value->move(public_path('Gallery/'),$filename);

                    $pageImage[] = $filename;
                }
                if($image->images == "" ){
                    $image->images = implode(',',$pageImage);
                }else{
                    $image->images .= ','. implode(',', $pageImage);
                }

                $image->page_slug = $pageDetails->slug;
                $image->save();
            }

            $pageDetails->save();
            return back()->with('status', 'successfully updated page details');
        }

    }
    public function mainPageStatus($id){


        $page = MainMenu::find($id);

        if($page->status == 1){
            $page->status = 0;
        }
        else{
            $page->status = 1;
        }
        $page->save();

        return back()->with('status', 'successfuly updated page status');
    }
    public function subPageStatus($id){


        $page = SubMenu::find($id);

        if($page->status ==1){
            $page->status = 0;
        }
        else{
            $page->status = 1;
        }
        $page->save();

        return back()->with('status', 'successfuly updated page status');
    }

    public static function getParentPage($parent_id){
        $mainPage = MainMenu::find($parent_id);
        return $mainPage->name;
    }

    public function mainPageInfo($slug){

        $pageInfo = MainMenu::where('slug',$slug)->first();
        $pageImage = PageImage::where('page_slug', $slug)->first();
        return view('Admin.main_page_info', ['pageInfo' => $pageInfo,'pageImage' => $pageImage]);

    }

//    sub page info showing function
    public function subPageInfo($slug){
        $pageInfo = SubMenu::where('slug',$slug)->first();
        $pageImage = PageImage::where('page_slug', $slug)->first();
        return view('Admin.sub_page_info', ['pageInfo' => $pageInfo,'pageImage'=>$pageImage]);
    }

    public function getsubpagedetails(Request $request){
        $subPageDetails = SubMenu::where('id',$request->subpage_Id)->first();
        $pageImage = PageImage::where('page_slug', $subPageDetails->slug)->first();
        return response()->json(['subPageDeatils' => $subPageDetails, 'pageImage' => $pageImage]);
    }

    public function pageDelete($slug){
        $page = MainMenu::where('slug', $slug)->first();

        if(is_null($page)){
            $page = SubMenu::where('slug', $slug)->first();
            if($page->status == 1){
                $page->status = 0;
            }
            $page->delete();
            return back()->with('status', 'successfully moved to the trash');
        }
        else{
            if($page->status == 1){
                $page->status = 0;
            }
            $page->delete();
            return back()->with('status', 'successfully moved to the trash');

        }
    }


    public function subPageTrash(){
        $subpage = SubMenu::onlyTrashed()->get();
        return view('Admin.sub_page_trash',['subPages'=>$subpage]);
    }
    public function restoresSubPage($slug){
        $restorePage = SubMenu::withTrashed()->where('slug', $slug)->restore();
        return redirect('/sub_page_list')->with('status', 'successfully restored');
    }
}