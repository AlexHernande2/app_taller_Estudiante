<?php
namespace nota;

use usuario\Usuario;

class Nota {
    private $id;
    private $descripcion;
    private $nota;
    private $codigoUsuario;
 
    public function getId(){
        return $this->id;
    }
    public function setId($value){
        $this-> id  = $value;
    }
    public function getCodigoUsuario(){
        return $this->codigoUsuario;
    }
    public function setCodigoUsuario($value){
        $this-> codigoUsuario  = $value;
    }
    
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($value){
        $this-> descripcion = $value;
    }

    public function getNota(){
        return $this->nota;
    }
    public function setNota($value){
        $this-> nota  = $value;
    }

}
