
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
            <input type="number" name="codigo" min="1" require>
        </label>
        <br>
        <label>
            <span>Nombre:</span>
            <input type="text" name="nombres" require>
        </label>
        <table>
            <thead>
                <th>Actividad </th>
                <th>Nota</th>
            </thead>
            <tbody>
                <?php
                // foreach ($notas as $nota) {
                //     echo '<tr>';
                //     echo '<td>' . $nota->getId() . '</td>';
                //     echo '<td>' . $nota->getDescripcion() . '</td>';
                //     echo '<td>' . $nota->getNota() . '</td>';
                //     echo '<td>';
                //     echo '      <a href="views/form_usuario.php?id=' . $usuario->getId() . '">Modificar</a>';
                //     echo '      <a href="views/accion_borrar_usuario.php?id=' . $usuario->getId() . '">Borrar</a>';
                //     echo '      <a href="notas.php?codigo=' . $usuario->getCodigo() . '">Nota</a>';
                //     echo '</td>';
                //     echo '</tr>';
                // }
        
          
                ?>
                 <br>
                <a href="../index.php">nuevo</a>
               
            </tbody>


    </main>

</body>

</html>