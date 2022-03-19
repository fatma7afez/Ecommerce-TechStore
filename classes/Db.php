<?php
namespace TechStore\Classes;

abstract class Db{

    protected $connectation;
    protected $table;

    public function connect(){
        $this->connectation = mysqli_connect(DB_SERVERNAME,DB_DATEBASENAME,DB_PASSWORD,DB_NAME);
    }

    public function selectAll(string $fields ="*"):array
    {
       $sql= "SELECT $fields FROM `$this->table`";
       $query = mysqli_query($this->connectation,$sql);
       return mysqli_fetch_all($query,MYSQLI_ASSOC);
    }

    public function selectId($id,string $fields ="*")
    {
       $sql= "SELECT $fields FROM `$this->table` WHERE `id`= '$id'";
       $query = mysqli_query($this->connectation,$sql);
       return mysqli_fetch_assoc($query);
    }

    public function selectWhere($cond,string $fields ="*"):array
    {
       $sql= "SELECT $fields FROM `$this->table` WHERE $cond";
       $query = mysqli_query($this->connectation,$sql);
       return mysqli_fetch_all($query,MYSQLI_ASSOC);

    }

    

    public function getCount()
    {
       $sql= "SELECT Count(*) As `act` FROM `$this->table`";
       $query = mysqli_query($this->connectation,$sql);
       $res= mysqli_fetch_assoc($query);
          return $res['act'];
    }

     public function insert(string $fields,$values):bool
    {
        $sql = "INSERT INTO `$this->table` ($fields) VALUES ($values)";
        return mysqli_query($this->connectation,$sql);
         
    }
    public function insertAndGetId(string $fields,$values)
    {
        $sql = "INSERT INTO `$this->table` ($fields) VALUES ($values)";
         mysqli_query($this->connectation,$sql);
        return mysqli_insert_id($this->connectation);
         
    }

    public function update(string $set,$id):bool
    {
        $sql = "UPDATE `$this->table` SET $set WHERE `id`='$id'";
        return mysqli_query($this->connectation,$sql);
        
    }


    public function delete($id):bool
    {
        $sql = "DELETE FROM `$this->table` WHERE `id`='$id'";
        return mysqli_query($this->connectation,$sql);
        
    }
    

    
    
}


?>
