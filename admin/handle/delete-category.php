<?php require_once("../../app.php") ?>
<?php

use TechStore\Classes\Models\Cats;


 if($request->getHas('id'))
 {
    $id = $request->get('id'); 
    $cat = new Cats;
    $cat->delete($id);

    $session->set("success","Admin Deleted Successful");
    $request->Aredirect("categories.php");
 }  