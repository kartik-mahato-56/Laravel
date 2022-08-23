<?php
use App\Models\Admin;

function admindata($id){
    $userdetails = Admin::where('id',"=",$id)->first();
    return $userdetails;
};

?>