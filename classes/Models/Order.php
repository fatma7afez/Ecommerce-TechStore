<?php

namespace TechStore\Classes\Models;

use  TechStore\Classes\Db;

class Order extends Db{

    public function __construct()
    {
       $this->table='orders';
       $this->connect(); 
    }
    public function selectAll(string $fields = "*"): array
    {
        $sql= " SELECT  $fields FROM $this->table JOIN order_details JOIN products
        ON order_details.order_id = $this->table.id
        AND order_details.order_id = products.id
        GROUP BY $this->table.id;";
        $query = mysqli_query($this->connectation,$sql);
        return mysqli_fetch_all($query,MYSQLI_ASSOC); 
    }
    public function selectId($id,string $fields ="*")
    {
       $sql= "SELECT $fields FROM $this->table
       JOIN order_details JOIN products 
       ON order_details.order_id = $this->table.id
       AND order_details.product_id = products.id
       WHERE $this->table.id = $id";
       $query = mysqli_query($this->connectation,$sql);
       return mysqli_fetch_assoc($query);
    }

   
}

?>