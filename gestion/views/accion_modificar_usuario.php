<?php

require '../models/usuario.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/UsuariosController.php';

use usuario\Usuario;
use usuarioController\UsuarioController;

$usuario = new Usuario();
// El post aca en este caso esta tomando los name de los input para que pueda modificar
$usuario->setCodigo($_POST['codigo']);
$usuario->setNombre($_POST['nombres']);
$usuario->setApellido($_POST['apellidos']);
$usuarioController = new UsuarioController();
$resultado = $usuarioController->update($usuario->getCodigo(), $usuario);

if ($resultado) {
    echo '<h1>Estudiante modificado</h1>';
} else {
    echo '<h1>No se pudo modificar el Estudiante</h1>';
}

?>

<br>
<a href="../index.php">Volver al inicio</a>