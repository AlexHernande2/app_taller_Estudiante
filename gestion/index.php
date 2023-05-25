<?php

require 'models/usuario.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/UsuariosController.php';

use usuarioController\UsuarioController;

$usuarioController = new UsuarioController();

$usuarios = $usuarioController->read();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="views/css/index.css">
    <title> Taller</title>
</head>

<body>
    <main>
        <h1 class="titulo">Estudiantes</h1>
        <a class="nuevoRegistro" href="views/form_usuario.php">Nuevo registro</a>
        <br>
        <br>

        <table class="table">
            <thead>
                <th>Código </th>
                <th>Nombre</th>
                <th>Apellido </th>
                <th></th>
            </thead>
            <tbody>
                <?php

                if (!empty($usuarios)) { // Verificar si la variable $usuarios no está vacía
                    foreach ($usuarios as $usuario) {
                        echo '<tr>';
                        echo '<td>' . $usuario->getCodigo() . '</td>';
                        echo '<td>' . $usuario->getNombre() . '</td>';
                        echo '<td>' . $usuario->getApellido() . '</td>';
                        echo '<td>';
                        echo '      <a href="views/form_usuario.php?codigo=' . $usuario->getCodigo() . '">Modificar</a>';
                        echo '      <a href="views/accion_borrar_usuario.php?codigo=' . $usuario->getCodigo() . '">Borrar</a>';
                        echo '      <a href="notas.php?codigo=' . $usuario->getCodigo() . '">Nota</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo "<br>";
                    echo 'No hay usuarios registrados.';
                }

                ?>
            </tbody>
        </table>

    </main>

</body>

</html>