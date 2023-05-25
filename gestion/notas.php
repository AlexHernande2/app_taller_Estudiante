<?php

require 'models/usuario.php';
require 'models/nota.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/UsuariosController.php';
require 'controllers/notaController.php';


$contadorNota=0;
$sumanota=0;


use notaController\NotaController;
$notaController = new NotaController();
// Para obtener el codigo y el nombre de la persona a la cual se le va a gregar la nota
use usuarioController\UsuarioController;
$usuarioController= new UsuarioController();
$codigo = $_GET['codigo'];
$usuario = $usuarioController->readRow($codigo);


// Se obtiene el valor del parámetro 'codigo' enviado por GET y se guarda en la variable $codigoUsuario 
$codigoUsuario = $_GET['codigo'];
// Se llama al método readRow de $notaController pasando $id como argumento y se guarda el resultado en $notas
$notas = $notaController->readRow($codigoUsuario);
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
                <th>Id: </th>
                <th>Actividad:</th>
                <th>Nota:</th>
            </thead>
            <tbody>
                <?php
                foreach ($notas as $nota) {
                    echo '<tr>';
                    echo '<td>' . $nota->getId() . '</td>';
                    echo '<td>' . $nota->getDescripcion() . '</td>';
                    echo '<td>' . $nota->getNota() . '</td>';
                    echo '<td>';
                    echo '      <a href="views/form_notas.php?id=' . $nota->getId() . '&codigo=' . $codigoUsuario . '">Modificar</a>';
                    echo '      <a href="views/accion_borrar_nota.php?id=' . $nota->getId() . '&codigo=' . $codigoUsuario . '">Borrar</a>';
                    echo '</td>';
                    echo '</tr>';
                    $contadorNota ++;
                    $sumanota= $sumanota + $nota->getNota();
                }

                if($contadorNota==0){
                    $imprimir= "No hay notas ingresadas ";
                }else {
                    $promedio = $sumanota/ $contadorNota;
                    if($promedio >= 3){
                        $imprimir = '<label style="color: green">Promedio: ' . number_format($promedio, 2) . '</label>';
                    }else{
                        $imprimir = '<label style="color: red">Promedio: ' . number_format($promedio, 2) . '</label>';
                    }
                }
                ?>
                  <tr>
                    <td colspan="3"><?php echo $imprimir; ?></td>
                </tr>
                <br>
                <a href="views/form_notas.php?codigo=<?php echo $codigoUsuario; ?>">Nuevo</a>
                <!-- <a href="views/form_notas.php">nuevo</a> -->

            </tbody>


    </main>

</body>

</html>