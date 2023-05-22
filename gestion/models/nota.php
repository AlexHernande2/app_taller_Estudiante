<?php
namespace nota;

use usuario\Usuario;

class Nota extends Usuario{
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
    public function setCodigoUsuario($codigo){
        $this-> codigoUsuario  = $codigo;
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
