<?php 

namespace usuarioController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use usuario\Usuario;
class UsuarioController extends BaseController
    {



        function create($usuario){
            $sql ='insert into estudiantes';
            $sql .='(codigo, nombres, apellidos) values';
            $sql .= '(';
            $sql .= $usuario -> getCodigo(). ',';
            $sql .= '"' . $usuario->getNombre() . '",';
            $sql .= '"' . $usuario->getApellido() . '"';
            $sql .= ')';
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
        }
    
  

        function read(){
            $sql = 'select * from estudiantes'; //Traer los usuarios
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $usuarios = [];
            while($registro = $resultadoSQL -> fetch_assoc()){ //fetch_assoc: recorrer resultados del SQL
                $usuario = new Usuario();
                $usuario ->setCodigo($registro['codigo']);
                $usuario ->setNombre($registro['nombres']);
                $usuario ->setApellido($registro['apellidos']);
                array_push($usuarios, $usuario);
            }
            $conexiondb->close();
            return $usuarios;
        }
 

        function readRow($codigo){
            $sql = 'select * from estudiantes'; //Traer los usuarios
            $sql .= ' where codigo=' .$codigo;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $usuario = new Usuario();
            while($registro = $resultadoSQL -> fetch_assoc()){ //fetch_assoc: recorrer resultados del SQL
                $usuario ->setCodigo($registro['codigo']);
                $usuario ->setNombre($registro['nombres']);
                $usuario ->setApellido($registro['apellidos']);
            }
            $conexiondb->close();
            return $usuario;
        }

        function update($codigo, $usuario){
            $sql = 'update estudiantes set ';
            $sql .= 'codigo="' .$usuario->getCodigo() .'",';
            $sql .= 'nombres="' .$usuario->getNombre() .'",';
            $sql .= 'apellidos="' .$usuario->getApellido() .'" ';
            $sql .= ' where codigo=' . $codigo;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
        }
        function delete($codigo){
            $sql = 'delete from estudiantes where codigo=' . $codigo;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
        }

    }
?>