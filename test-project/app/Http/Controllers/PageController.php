<?php

namespace App\Http\Controllers;

use App\Models\MainMenu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\DB;
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
        $subpage = SubMenu::where('parent_menu_id', $request->mainpage)->get();


        return response()->json($subpage);
    }

    public function pageDetailsSubmit(Request $request){
        
        if($request->parent_page_id != "" && $request->sub_page_id == ""){
            $pageDetails = MainMenu::where('id',$request->parent_page_id)->first();
            $pageDetails->description  = $request->description;

            if($request->hasFile('images')){
                foreach ($request->file('images') as  $value) {
                    $file_type =$value->extension();
                    $filename = uniqid().".".$file_type;
                    $value->move(public_path('Gallery/'),$filename);
                    $galley_image[] = $filename;
                }
                $pageDetails->images =  implode(',',$galley_image);
            }

            $pageDetails->save();
            return back()->with('status', 'successfully added page details');

        }
        
        
        else if($request->parent_page_id != "" && $request->sub_page_id != ""){
            $pageDetails = SubMenu::where('id',$request->sub_page_id)->first();
            $pageDetails->description  = $request->description;

            if($request->hasFile('images')){
                foreach ($request->file('images') as  $value) {
                    $file_type =$value->extension();
                    $filename = uniqid().".".$file_type;
                    $value->move(public_path('Gallery/'),$filename);
                    $galley_image[] = $filename;
                }
                $pageDetails->images =  implode(',',$galley_image);
            }
            
            $pageDetails->save();

          
            return back()->with('status', 'successfully added page details');

        }
    }
    public function mainPageStatus($id){
        
 
        $page = MainMenu::find($id);
        
        if($page->status ==1){
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
    
    return view('Admin.main_page_info', ['pageInfo' => $pageInfo]);

   }
}
