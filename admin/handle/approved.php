<?php require_once("../../app.php") ?>

<?php
use TechStore\Classes\Models\Order;


if($request->getHas('id'))
{
   $id = $request->get('id'); 
   $ord= new Order;
   $ord->update("status ='approved'",$id);
   $session->set('success',"order Approved");
   $request->Aredirect("order.php?id=".$id);

}




?>