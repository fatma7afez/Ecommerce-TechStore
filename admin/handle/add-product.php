<?php require_once("../../app.php") ?>
 <?php

use TechStore\Classes\File;
use  TechStore\Classes\Validation\Validator;
use TechStore\Classes\Models\Product;
 


    if ($request->postHas("submit")) {
        $name = $request->post("name");
        $piece_num = $request->post("piece_num");
        $price = $request->post("price");
        $desc = $request->post("desc");
        $cat_id = $request->post("cat_id");
        $img = $request->files("img");

        // valdation of inputs

        $validator = new Validator;
        $validator->validate('Name',$name,['required','str','max']);
        $validator->validate('Piece Number', $piece_num,['required','numeric']);
        $validator->validate('Price', $price,['required','numeric']);
        $validator->validate('Description',  $desc,['required','str','max']);
        $validator->validate('cat_id', $cat_id ,['required','numeric']);
        $validator->validate("Image",$img,['requiredImg','Image']);

        if($validator->HasError()){
            $session->set("errors",$validator->getErrors());
            $request->Aredirect("add-product.php");

        }
        else{
             $i =  new File($img);
             $imgUploadName = $i->rename()->upload();
             $pr = new Product;
             $pr->insert("name ,`desc`, price, piece_num, img, cat_id",
             "'$name','$desc','$price','$piece_num','$imgUploadName','$cat_id'");
             $session->set("success","Product Added Successful");
             $request->Aredirect("products.php");
            }

    }else{
        $request->redirect("products.php");
    }