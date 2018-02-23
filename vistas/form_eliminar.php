<?php
include "cabecera.php";

if (empty($empleadosEliminar)) {
    echo "<h3 class='text-danger'>$error</h3>";
    include "pie.php";
    exit();
}


echo "<h1>¿Qué empleado/a desea eliminar?</h1>";

if (isset($resultado)) {
    echo "<h3 class='text-success'>$resultado</h3>";
}


echo "<div class='table-responsive'>";
echo "<table class='table table-hover'><tr><th>Nombre</th><th>Apellido</th><th>NSS</th></tr>";
//$empleados -> fetchAll();
foreach ($empleadosEliminar as $empleado) {
?>
    <form action="index.php" method="post">
        <tr>
            <td><?php echo htmlspecialchars($empleado['nombre']) ?></td>
            <td><?php echo htmlspecialchars($empleado['apellido']) ?></td>
            <td><?php echo htmlspecialchars($empleado['nss']) ?> </td>
            <td><input type="submit" name="eliminar" value="Eliminar" /></td>
        </tr>
        <input type="hidden" name="empleadoEliminar" value="<?php echo htmlspecialchars($empleado['nss']) ?>" />
    </form>
    <?php
}
echo "</table>";
echo "</div>";

include "pie.php";
?>