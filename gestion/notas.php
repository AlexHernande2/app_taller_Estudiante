<?php

require 'models/usuario.php';
require 'models/nota.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/UsuariosController.php';
require 'controllers/notaController.php';



use usuario\Usuario;


use notaController\NotaController;
$notaController = new NotaController();
// Para obtener el codigo y el nombre de la persona a la cual se le va a gregar la nota
use usuarioController\UsuarioController;
$usuarioController= new UsuarioController();
$codigo = $_GET['codigo'];
$usuario = $usuarioController->readRow($codigo);

//
$id = $_GET['codigo']; 
$notas = $notaController->readRow($id);



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title> Notas</title>
</head>

<body>
    <main>
        <h1>Notas</h1>
        <a href="index.php">Volver al inicio</a>
        <br>

        <label>
            <span>Código:</span>
            <input type="number" name="codigo" min="1"  value="<?php echo $usuario->getCodigo(); ?>" readonly>
        </label>
        <br>
        <label>
            <span>Nombre:</span>
            <input type="text" name="nombres" value="<?php echo $usuario->getNombre(); ?>" readonly>
        </label>
        <table>
            <thead>
                <th>Actividad </th>
                <th>Nota</th>
            </thead>
            <tbody>
                <?php
                foreach ($notas as $nota) {
                    echo '<tr>';
                    echo '<td>' . $nota->getId() . '</td>';
                    echo '<td>' . $nota->getDescripcion() . '</td>';
                    echo '<td>' . $nota->getNota() . '</td>';
                    echo '<td>';
                    echo '      <a href="views/form_usuario.php?id=' . $nota->getId() . '">Modificar</a>';
                    echo '      <a href="views/accion_borrar_usuario.php?id=' . $nota->getId() . '">Borrar</a>';
                    echo '      <a href="notas.php?codigo=' . $nota->getCodigo() . '">Nota</a>';
                    echo '</td>';
                    echo '</tr>';
                }


                ?>
                <br>
                <a href="views/form_notas.php">nuevo</a>

            </tbody>


    </main>

</body>

</html>