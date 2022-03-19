<?php require_once('../app.php') ?>
 <?php

    use TechStore\Classes\Cart;

    if ($request->postHas("submit")) {
        $qty = $request->post("qty");
        $id = $request->post("id");
        $name = $request->post("name");
        $price = $request->post("price");
        $img = $request->post("img");

        // put them in array
        $prodData = [
            'id' => $id,
            'qty' => $qty,
            'name' => $name,
            'price' => $price,
            'img' => $img,
        ];

        $cart = new Cart;
        $cart->add($id, $prodData);
        $request->redirect("products.php");
    }
