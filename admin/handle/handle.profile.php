<?php require_once("../../app.php") ?>
 <?php

    use TechStore\Classes\Models\Admin;
    use  TechStore\Classes\Validation\Validator;


    if ($request->postHas("submit")) {
        $name = $request->post("name");
        $email = $request->post("email");
        $password = $request->post("password");
        $confirm_password = $request->post("confirm_password");


        // valdation of inputs

        $validator = new Validator;
        $validator->validate('name', $name, ['required', 'str', 'max']);
        $validator->validate('email', $email, ['required', 'email', 'max']);

        if(!empty($password) && ! $password == $confirm_password){
            $validator->validate('password', $password, ['required', 'str', 'max']);
        }



        if ($validator->HasError()) {
            $session->set("errors", $validator->getErrors());
            $request->Aredirect("login.php");
        } else {
           
            $ad = new Admin;
        //    $id = $session->get('adminId');
            if(!empty($password)){
                // update with password
                $hash=password_hash($password,PASSWORD_DEFAULT);
                $ad->update("name = '$name' ,email= '$email' ,`password` = '$hash'",$session->get('adminId')); 
            }
            else{
                // update without password
                $ad->update("name = '$name' ,email = '$email'" ,$session->get('adminId')); 
               
            }
            $session->set('success', "profile edit successful");
            $request->Aredirect("handle/handle.logout.php");
        }
    } else {
        $request->Aredirect("login.php");
    }
