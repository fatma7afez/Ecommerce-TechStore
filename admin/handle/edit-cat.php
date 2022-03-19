<?php require_once("../../app.php") ?>
 <?php

use TechStore\Classes\Models\Cats;
use  TechStore\Classes\Validation\Validator;
 


    if ($request->postHas("submit")) {
        $name = $request->post("name");
        $id= $request->post("id");

        // valdation of inputs

        $validator = new Validator;
        $validator->validate('Name',$name,['required','str','max']);
      
        if($validator->HasError()){
            $session->set("errors",$validator->getErrors());
            $request->Aredirect("add-product.php");

        }
        else{
             $cat = new Cats;
             $cat->update("name ='$name'",$id);
             $session->set("success","Category Added Successful");
             $request->Aredirect("categories.php");
            }

    }else{
        $request->redirect("categories.php");
    }