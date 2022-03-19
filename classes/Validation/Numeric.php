<?php

namespace  TechStore\Classes\Validation;

class Numeric implements ValidationRule{

     public function check(string $name, $value)

     {
         if(! is_numeric($value)){
             return "$name Must Be Contain Only Numbers ";
         } 
             return false; 
     }

}


?>