<?php
use App\Models\Admin;
use App\Models\MainMenu;
use App\Models\SubMenu;

function admindata($id){
    $userdetails = Admin::where('id',"=",$id)->first();
    return $userdetails;
};

function mainMenu(){
    $mainMenu = MainMenu::where('status',1)->get();
    
    return $mainMenu;
}

function subMenu($parent_menu){
    $subMenu = SubMenu::where('parent_menu', $parent_menu)->get();
    return $subMenu;
}

?>