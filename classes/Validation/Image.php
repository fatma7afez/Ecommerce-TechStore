<?php

namespace  TechStore\Classes\Validation;

class Image implements ValidationRule{

     public function check(string $name, $value)
 
     {
         $ex = pathinfo($value['name'],PATHINFO_EXTENSION);
         $extensionAllowed =["png","jpg","jpeg","gif"];
         if(! in_array($ex,$extensionAllowed)){
             return "$name Extension Is Not Allowed ,Plz please Upload jpg , png , jpeg or gif ";
         } 
             return false; 
     }

}


?>