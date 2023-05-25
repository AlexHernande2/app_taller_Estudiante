<?php 

require '../models/usuario.php';
require '../models/nota.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/UsuariosController.php';
require '../controllers/notaController.php';

use nota\Nota;
use notaController\NotaController;
use usuarioController\UsuarioController;
use usuario\Usuario;

$nota = new Nota ();
// El post aca en este caso esta tomando los name de los input para que pueda modificar


$nota ->setId($_POST['id']);
$nota ->setDescripcion($_POST['descripcion']);
$nota -> setNota($_POST['nota']);
$usuarioController = new UsuarioController();
$usuario = $usuarioController->readRow($_POST['codigoUsuario']);
// Ayuda a tener el código del usuario en el objeto $nota
$nota -> setCodigoUsuario($usuario->getCodigo());

$notaController = new NotaController();

$resultado = $notaController->update ($nota->getId(), $nota);
if($resultado){
    echo '<h1>Nota modificado</h1>';
}else{
    echo '<h1>No se pudo modificar la nota</h1>';
}

?>
<br>
<a href="../index.php">Volver al inicio</a>