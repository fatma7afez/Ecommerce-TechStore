<?php 

namespace  TechStore\Classes\Validation;

class Validator{

    private $errors= [];
    public function validate(string $name,$value,array $rules){
        foreach($rules as $rule){
            $className = 'TechStore\\Classes\\Validation\\'.$rule;
            $obj = new $className;
            $error =$obj->check($name,$value);
            
            if($error !== false){
                $this->errors[]=$error;
                break;
            }

        }
    }

    public function getErrors() :array{
        return $this->errors;
    }

    // to check errors to go db store it and set session for message
    public function HasError() :bool{
        return ! empty($this->errors);
    }
  
}



?>