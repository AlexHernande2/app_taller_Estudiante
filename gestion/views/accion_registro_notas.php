<?php 

require '../models/usuario.php';
require '../models/nota.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/UsuariosController.php';
require '../controllers/notaController.php';

use usuario\Usuario;
use nota\Nota;
use usuarioController\UsuarioController;
use notaController\NotaController;

$nota = new Nota();
$nota -> setId($_POST['id']);
$nota -> setDescripcion($_POST['descripcion']);
$nota -> setNota($_POST['nota']);

$usuarioController = new UsuarioController();
$usuario = $usuarioController->readRow($_POST['codigo']);
// Ayuda a tener el código del usuario en el objeto $nota
$nota -> setCodigoUsuario($usuario->getCodigo());

$notaController = new NotaController();
$resultado = $notaController->create($nota);
if($resultado){
    echo '<h1>Nota registrada</h1>';
}else{
    echo '<h1>No se pudo registrar la nota</h1>';
}

?>
<a href="../index.php">Volver al inicio</a>