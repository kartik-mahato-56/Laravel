<?php
use App\Models\Admin;
use App\Models\Page;

function admindata($id){
    $userdetails = Admin::where('id',"=",$id)->first();
    return $userdetails;
};

function pages(){
    $pages = Page::all();
    return $pages;
}

?>