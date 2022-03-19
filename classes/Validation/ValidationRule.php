<?php
namespace  TechStore\Classes\Validation;

// all validation classes implement it..
interface ValidationRule{
    public function check(string $name,$value);
}

?>
