<?php 

namespace notaController;

use baseControler\BaseController;
use baseControler\BaseControllerNota;
use conexionDb\ConexionDbController;
use nota\Nota;
use usuario\Usuario;

class NotaController extends BaseControllerNota
    {

        public function create($nota)
        {

            $sql = 'insert into actividades ';
            $sql .= '(id,descripcion,nota,codigoEstudiante) values';
            $sql .='(';
            $sql .= $nota -> getId(). ',';
            $sql .=  '"' .$nota -> getDescripcion(). '",';
            $sql .=  '"' .$nota-> getNota(). '",';
            $sql .=  '"' .$nota-> getCodigoUsuario(). '"';
            $sql .=')';
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
        }
    
        public function read()
        {
      
        }
    
        public function update($id, $nota)
        {
            $sql ='update actividades set';
            $sql .= 'id="' .$nota->getId() .'",';
            $sql .= 'descripcion="' .$nota->getDescription() .'",';
            $sql .= 'nota="' .$nota->getNota() .'",';
            $sql .= 'codigoEstudiante="' .$nota->getCodigoUsuario() .'" ';
            $sql .= 'where id=' .$id;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
        }
        public function readRow($codigoUsuario){
            $sql = 'select *  from actividades'; 
            $sql .= ' where codigoEstudiante=' .$codigoUsuario;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $notas=[];
            while ($registro = $resultadoSQL->fetch_assoc()) {
                //lo que va dentro de $registro debe ser como se llama en la base de datos la columna 
                $nota = new Nota();
                $nota->setId($registro['id']);
                $nota->setDescripcion($registro['descripcion']);
                $nota->setNota($registro['nota']);
                $nota->setCodigoUsuario($registro['codigoEstudiante']);
                array_push($notas,$nota);
            }
            $conexiondb->close();
            return $notas;
        }

          
        public function delete($id)
        {
            $sql = 'delete from actividades where id=' .$id;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
        }
    
    }

?>