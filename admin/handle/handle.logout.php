<?php require_once("../../app.php") ?>
 <?php

    use TechStore\Classes\Models\Admin;

    $ad=new Admin;
    $ad->logout($session);
    $request->Aredirect("login.php");



?>    