<?php
namespace nota_usuario;

class Nota{
    private $id;
    private $description;
    private $note;
 
    public function getId(){
        return $this->id;
    }
    public function setId($value){
        $this-> id  = $value;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setNDescription($value){
        $this-> description  = $value;
    }

    public function getNote(){
        return $this->note;
    }
    public function setLatNote($value){
        $this-> note  = $value;
    }

}
?>