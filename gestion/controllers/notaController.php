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
            $sql .=  '"' .$nota -> getDescripcion(). ',';
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
        public function readRow($id){
            $sql = 'select *  from actividades'; 
            $sql .= ' where id=' .$id;
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

       /*       

                //             public function readRow($codigo)
                // {
                //     $sql = 'SELECT n.*, u.codigo AS codigo_usuario, u.nombres, u.apellidos ';
                //     $sql .= 'FROM notas n ';
                //     $sql .= 'INNER JOIN estudiantes u ON n.codigo_usuario = u.codigo ';
                //     $sql .= 'WHERE n.id = ' . $codigo;
                //     $conexiondb = new ConexionDbController();
                //     $resultadoSQL = $conexiondb->execSQL($sql);
                //     $nota = new Nota()
                //     while ($registro = $resultadoSQL->fetch_assoc()) {
                //         $nota->setId($registro['id']);
                //         $nota->setCodigoUsuario($registro['codigo_usuario']);
                //         $nota->setDescription($registro['description']);
                //         $nota->setNote($registro['note']);
                        
                //         // También puedes asignar los valores del usuario si los necesitas
                //         $usuario = new Usuario();
                //         $usuario->setCodigo($registro['codigo_usuario']);
                //         $usuario->setNombre($registro['nombres']);
                //         $usuario->setApellido($registro['apellidos']);
                //         $nota->setUsuario($usuario);
                //     }

                //     $conexiondb->close();
                //     return $nota;
                // }
                        // function readRow($codigo){
                        //     $sql = 'select * from estudiantes'; //Traer los usuarios
                        //     $sql .= ' where codigo=' .$codigo;
                        //     $conexiondb = new ConexionDbController();
                        //     $resultadoSQL = $conexiondb->execSQL($sql);
                        //     $usuario = new Usuario();
                        //     while($registro = $resultadoSQL -> fetch_assoc()){ //fetch_assoc: recorrer resultados del SQL
                        //         $usuario ->setCodigo($registro['codigo']);
                        //         $usuario ->setNombre($registro['nombres']);
                        //         $usuario ->setApellido($registro['apellidos']);
                        //     }
                        //     $conexiondb->close();
                        //     return $usuario;
                        // }

        */
