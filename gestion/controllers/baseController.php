<?php namespace baseControler;

    abstract class BaseController{
        abstract function create($model);
        abstract function read();
        abstract function update($codigo, $usuari);
        abstract function delete($codigo);
        abstract function readRow($codigo);
    }
    abstract class BaseControllerNota{
        abstract function create($model);
        abstract function update($id, $nota);
        abstract function delete($id);
        abstract function readRow($codigoUsuario);
        abstract function readRow1($id);
    }
    

?>