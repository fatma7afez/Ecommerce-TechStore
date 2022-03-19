<?php

namespace  TechStore\Classes\Validation;

class Required implements ValidationRule{

     public function check(string $name, $value)

     {
         if(empty($value) || strlen($value) == 0){
             return "$name Is Required";
         } 
             return false; 
     }

}


?>