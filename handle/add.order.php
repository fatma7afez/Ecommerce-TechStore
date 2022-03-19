<?php require_once("../app.php") ?>
 <?php

use TechStore\Classes\Cart;
use  TechStore\Classes\Validation\Validator;
use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetails;

$cart = new Cart;

    if ($request->postHas("submit") && $cart->count() !== 0) {
        $name = $request->post("name");
        $phone = $request->post("phone");
        $address = $request->post("address");
        $email = $request->post("email");


        // valdation of inputs

        $validator = new Validator;
        $validator->validate('name',$name,['required','str','max']);
        $validator->validate('phone',$phone,['required','str','max']);
        if(! empty($address)){
            $validator->validate('address',$address,['str','max']);
            $address="'$address'";
        }
        else{
            $address="Null";
        }
        if(! empty($email)){
            $validator->validate('email',$email,['email','str','max']);
            $email="'$email'";
        }
        else{
            $email="Null";
        }


        if($validator->HasError()){
            $session->set("errors",$validator->getErrors());
            $request->redirect("cart.php");

        }
        else{
             $order= new Order;
             $orderDetails= new OrderDetails;
             $orderId= $order->insertAndGetId("name,phone,address,email","'$name','$phone',$address,$email");
              foreach($cart->all() as $prodId=> $prodData){
                  $qty = $prodData['qty'];
                  $orderDetails->insert("product_id,order_id,qty","'$prodId','$orderId','$qty'");
              } 
              $cart->empty();
              $request->redirect("products.php");
            }

    }else{
        $request->redirect("products.php");
    }