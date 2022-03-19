<?php

namespace TechStore\Classes\Models;

use  TechStore\Classes\Db;

class Product extends Db{

    public function __construct()
    {
       $this->table='products';
       $this->connect(); 
    }
    public function selectId($id,string $fields ="products.*")
    {
       $sql= "SELECT $fields FROM `$this->table`
        INNER JOIN cats ON $this->table.cat_id = cats.id 
        WHERE $this->table.id= '$id'";
        $query = mysqli_query($this->connectation,$sql);
        return mysqli_fetch_assoc($query);
    }
    public function select(string $fields ="*"):array
    {
       $sql= "SELECT $fields FROM `$this->table`";
       $query = mysqli_query($this->connectation,$sql);
       return mysqli_fetch_all($query,MYSQLI_ASSOC);
    }
    public function selectAll(string $fields ="*"):array
    {
       $sql= "SELECT $fields FROM `$this->table`
        JOIN cats ON $this->table.cat_id = cats.id 
        ORDER BY $this->table.id DESC ";
       $query = mysqli_query($this->connectation,$sql);
       return mysqli_fetch_all($query,MYSQLI_ASSOC);
    }

}
