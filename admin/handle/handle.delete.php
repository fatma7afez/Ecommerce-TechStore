<?php require_once("../../app.php") ?>
<?php

    use TechStore\Classes\Models\Product;


 if($request->getHas('id'))
 {
    $id = $request->get('id'); 
    $pr =new Product;
    $prodImg  = $pr->selectId($id,"img")['img'];
    unlink(PATH."upload/".$prodImg);
    $pr->delete($id);

    $session->set("success","Product Deleted Successful");
    $request->Aredirect("products.php");
 }    

?>