<?php
use App\Models\Admin;
use App\Models\MainMenu;
use App\Models\SubMenu;

function admindata($id){
    $userdetails = Admin::where('id',"=",$id)->first();
    return $userdetails;
};

function mainPage(){
    $mainMenu = MainMenu::where('status',1)->get();
    
    return $mainMenu;
}

function subMenu($parent_id){
    $subMenu = MainMenu::where('id', $parent_id)->get();
    return $subMenu;
}

?>