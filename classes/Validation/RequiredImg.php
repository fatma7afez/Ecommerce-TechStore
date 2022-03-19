<?php

namespace  TechStore\Classes\Validation;

class RequiredImg implements ValidationRule{

     public function check(string $name, $value)

     {
         if($value["error"] != 0){
             return "$name Is Required Image";
         } 
             return false; 
     }

}


?>