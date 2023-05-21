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
    <title> Taller</title>
</head>

<body>
    <main>
        <h1>Estudiantes</h1>
        <a href="views/form_usuario.php">nuevo</a>
        <table>
            <thead>
                <th>Código </th>
                <th>Nombre</th>
                <th>Apellido </th>
            </thead>
            <tbody>
                <?php
                foreach ($usuarios as $usuario) {
                    echo '<tr>';
                    echo '<td>' . $usuario->getCodigo() . '</td>';
                    echo '<td>' . $usuario->getNombre() . '</td>';
                    echo '<td>' . $usuario->getApellido() . '</td>';
                    echo '<td>';
                    echo '      <a href="views/form_usuario.php?id=' . $usuario->getCodigo() . '">modificar</a>';
                    echo '      <a href="views/accion_borrar_usuario.php?id=' . $usuario->getCodigo() . '">borrar</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                // if (!empty($usuarios)) { // Verificar si la variable $usuarios no está vacía
                //     foreach ($usuarios as $usuario) {
                //         // Mostrar los datos del usuario
                //         echo 'Código: ' . $usuario->getCodigo() . '<br>';
                //         echo 'Nombre: ' . $usuario->getNombre() . '<br>';
                //         echo 'Apellido: ' . $usuario->getApellido() . '<br>';
                //         echo '------------------------<br>';
                //     }
                // } else {
                //     echo "<br>";
                //     echo 'No hay usuarios registrados.';
                // }
                ?>
            </tbody>
        </table>

        <!-- <button class="bottom-right" href="views/form_usuario.php">Nuevo</button> -->
    </main>

</body>

</html>