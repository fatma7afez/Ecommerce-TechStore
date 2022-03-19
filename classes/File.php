<?php
namespace TechStore\Classes;

class File{

    private $name , $uploadName,$tmp_name;

    public function __construct(array $file )
    {
        $this->name= $file['name'];
        $this->tmp_name= $file['tmp_name'];
    }

    public function rename()
    {
        $ext = pathinfo($this->name,PATHINFO_EXTENSION);
        $randomStr = uniqid();
        $this->uploadName="$randomStr.$ext";
        return $this;
    }

    public function setName($name)
    {
        $this->uploadName=$name;
        return $this;
    }

    public function upload()
    {
        $destination = PATH . "upload/" . $this->uploadName;
        move_uploaded_file($this->tmp_name,$destination);
        return $this->uploadName;
    }
}

?>