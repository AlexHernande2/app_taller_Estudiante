<?php
require '../models/usuario.php';
require '../models/nota.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/UsuariosController.php';
require '../controllers/notaController.php';

use usuario\Usuario;
use usuarioController\UsuarioController;
use nota\Nota;
use notaController\NotaController;

$usuarioController= new UsuarioController();
$codigo = $_GET['codigo'];
$usuario = $usuarioController->readRow($codigo);



$id = empty($_GET['id']) ? '' : $_GET['id']; //Si es vacio
//lee los '' vacios, en caso contrario lee el $_GET

$titulo = 'Registrar Nota';
$urlAction = "accion_registro_notas.php";
$nota = new Nota();


if (!empty($id)) {
    $titulo = 'Modificar Nota';
    $urlAction = "accion_modificar_notas.php";
    $notaController = new NotaController();
    $nota = $notaController->readRow1($id);
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>estudiante</title>
</head>

<body>
    <h1><?php echo $titulo; ?></h1>
    <form action="<?php echo $urlAction; ?>" method="post">
        <label>
            <!-- <span>Id:</span> -->
            <input hidden type="number" name="id" min="1" value="<?php echo $nota->getId(); ?>">
        </label>
        <br>

        <br>
        <label>
            <span>Actividad:</span>
            <input type="text" name="descripcion" value="<?php echo $nota->getDescripcion(); ?>" require>
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="number" name="nota" value="<?php echo $nota->getNota(); ?>" require>
        </label>
        <br>
        <!-- <label>
            <span>Codigo Estudiante:</span>
            <input type="number" name="codigoUsuario" value="<?php echo $nota->getCodigoUsuario($codigo); ?>" require>
        </label>  -->
        <label>
            <span>Codigo Estudiante:</span>
            <input type="number" name="codigoUsuario" value="<?php echo $codigo; ?>" readonly>

        </label> 
        <br>

        <br>
        <button type="submit">Guardar</button>
    </form>


</body>

</html>