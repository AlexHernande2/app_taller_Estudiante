<?php
require '../models/usuario.php';
require '../models/nota.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/UsuariosController.php';
require '../controllers/notaController.php';


use notaController\NotaController;

$notaController = new NotaController();

$resultado = $notaController->delete($_GET['id']);

if($resultado){
    echo '<h1>Nota borrada</h1>';
}else{
    echo '<h1>No se pudo borrar la Nota</h1>';
}

?>
<a href="../index.php">Volver al inicio</a>

