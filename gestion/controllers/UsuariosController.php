<?php 

namespace usuarioController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use usuario\Usuario;
class UsuarioController extends BaseController
    {

        function create($usuario){
            $sql ='insert into estudiantes';
            $sql='(code, name, lastName) values';
            $sql= $usuario -> getCode(). ',';
            $sql .= '"' . $usuario->getName() . '",';
            $sql .= '"' . $usuario->getLastName() . '",';
            $sql .= ')';
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
        }

        function read(){
            $sql = 'select * from usuarios'; //Traer los usuarios
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $usuarios = [];
            while($registro = $resultadoSQL -> fetch_assoc()){ //fetch_assoc: recorrer resultados del SQL
                $usuario = new Usuario();
                $usuario ->setCode($registro['code']);
                $usuario ->setName($registro['name']);
                $usuario ->setLastName($registro['lastName']);
                array_push($usuarios, $usuario);
            }
            $conexiondb->close();
            return $usuarios;
        }

        function readRow($id){
            $sql = 'select * from usuarios'; //Traer los usuarios
            $sql .= ' where id=' .$id;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $usuario = new Usuario();
            while($registro = $resultadoSQL -> fetch_assoc()){ //fetch_assoc: recorrer resultados del SQL
                $usuario ->setCode($registro['code']);
                $usuario ->setName($registro['name']);
                $usuario ->setLastName($registro['lastName']);
            }
            $conexiondb->close();
            return $usuario;
        }

        function update($id, $usuario){
            
            
        }

        function delete(){
           
        }

    }





?>