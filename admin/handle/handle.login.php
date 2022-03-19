<?php require_once("../../app.php") ?>
 <?php

    use TechStore\Classes\Models\Admin;
    use  TechStore\Classes\Validation\Validator;


    if ($request->postHas("submit")) {
        $email = $request->post("email");
        $password = $request->post("password");


        // valdation of inputs

        $validator = new Validator;
        $validator->validate('password', $password, ['required', 'str', 'max']);
        $validator->validate('email', $email, ['required', 'email', 'max']);



        if ($validator->HasError()) {
            $session->set("errors", $validator->getErrors());
            $request->Aredirect("login.php");
        } else {
            $ad = new Admin;
            $islogin = $ad->login($email, $password, $session);
            if ($islogin) {
                $request->Aredirect("index.php");
            } else {
                $session->set("errors", ["credential are not correct"]);
                $request->Aredirect("login.php");
            }
        }
    } else {
        $request->Aredirect("login.php");
    }
