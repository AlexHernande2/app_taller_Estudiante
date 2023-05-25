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
        $sql .= '(descripcion,nota,codigoEstudiante) values';
        $sql .= '("';
        $sql .= $nota->getDescripcion() . '",';
        $sql .=  '"' . $nota->getNota() . '",';
        $sql .=  '"' . $nota->getCodigoUsuario() . '"';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    public function update($id, $nota)
    {
        $sql = 'update actividades set ';
        $sql .= 'descripcion="' . $nota->getDescripcion() . '",';
        $sql .= 'nota="' . $nota->getNota() . '",';
        $sql .= 'codigoEstudiante="' . $nota->getCodigoUsuario() . '" ';
        $sql .= 'where id = ' . $id;

        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();

        return $resultadoSQL;
    }

    public function readRow($codigoUsuario)
    {
        $sql = 'select *  from actividades';
        $sql .= ' where codigoEstudiante=' . $codigoUsuario;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $notas = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            //lo que va dentro de $registro debe ser como se llama en la base de datos la columna 
            $nota = new Nota();
            $nota->setId($registro['id']);
            $nota->setDescripcion($registro['descripcion']);
            $nota->setNota($registro['nota']);
            $nota->setCodigoUsuario($registro['codigoEstudiante']);
            array_push($notas, $nota);
        }
        $conexiondb->close();
        return $notas;
    }

    public function readRow1($id)
    {
        $sql = 'select * from actividades';
        $sql .= ' where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $nota = new Nota();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $nota->setId($registro['id']);
            $nota->setDescripcion($registro['descripcion']);
            $nota->setNota($registro['nota']);
            $nota->setCodigoUsuario($registro['codigoEstudiante']);
        }
        $conexiondb->close();
        return $nota;
    }


    public function delete($id)
    {
        $sql = 'delete from actividades where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}
