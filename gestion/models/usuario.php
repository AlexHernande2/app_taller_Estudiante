<?php
namespace usuario;

class Usuario{
    private $code;
    private $name;
    private $lastName;
 
    public function getCode(){
        return $this->code;
    }
    public function setCode($value){
        $this-> code  = $value;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($value){
        $this-> name  = $value;
    }

    public function getLastName(){
        return $this->lastName;
    }
    public function setLastName($value){
        $this-> lastName  = $value;
    }
}
?>