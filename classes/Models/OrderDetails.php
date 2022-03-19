<?php

namespace TechStore\Classes\Models;

use  TechStore\Classes\Db;


class OrderDetails extends Db{

    public function __construct()
    {
       $this->table='order_details';
       $this->connect(); 
    }
    public function selectWithProducts($orderid){
        $sql= "SELECT qty, name, price FROM $this->table
        JOIN products ON $this->table.product_id = products.id
        WHERE order_id = $orderid";
        $query = mysqli_query($this->connectation,$sql);
        return mysqli_fetch_all($query,MYSQLI_ASSOC);
 
    }
}

?>