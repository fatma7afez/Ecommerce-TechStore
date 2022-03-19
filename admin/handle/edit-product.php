<?php require_once("../../app.php") ?>
 <?php

use TechStore\Classes\File;
use  TechStore\Classes\Validation\Validator;
use TechStore\Classes\Models\Product;

    if ($request->postHas("submit")) {
        $id =  $request->post("id");
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

        if($img['error'] == 0)
        {
            $validator->validate("Image",$img,['Image']);

        }
        if($validator->HasError()){
            $session->set("errors",$validator->getErrors());
            $request->Aredirect("add-product.php");

        }
        else{
            $pr = new Product;
            $imgName = $pr->selectId($id,'img')['img'];

            if($img['error'] == 0)
            {
              unlink(PATH."upload/". $imgName);
              $file =  new File($img);
              $imgName = $file->rename()->upload();
            }
           
             $pr->update("name ='$name' ,`desc` ='$desc', price ='$price',
              piece_num = ' $piece_num', img = '$imgName', cat_id = '$cat_id'",$id);
             $session->set("success","Product Updated Successful");
             $request->Aredirect("products.php");

            }

    }else{
        $request->redirect("products.php");
    }