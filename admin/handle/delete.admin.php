<?php require_once("../../app.php") ?>
<?php

use TechStore\Classes\Models\Admin;


 if($request->getHas('id'))
 {
    $id = $request->get('id'); 
    $admin = new Admin;
    $admin->delete($id);

    $session->set("success","Category Deleted Successful");
    $request->Aredirect("admins.php");
 }  