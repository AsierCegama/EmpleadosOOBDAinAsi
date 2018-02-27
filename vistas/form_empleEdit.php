<?php
include "cabecera.php";

if (empty($empleadosEditar)) {
    echo "<h3 class='text-danger'>$error</h3>";
    include "pie.php";
    exit();
}


echo "<h1>¿Qué empleado/a desea eliminar?</h1>";

if (isset($resultado)) {
    echo "<h3 class='text-success'>$resultado</h3>";
}


echo "<div class='table-responsive'>";
echo "<table class='table table-hover'><tr><th>Nombre</th><th>Apellido</th><th>NSS</th><th>Acción</th></tr>";
//$empleados -> fetchAll();
foreach ($empleadosEditar as $empleado) {
?>
    <form action="index.php" method="post">
        <tr>
            <td><?php echo htmlspecialchars($empleado['nombre']) ?></td>
            <td><?php echo htmlspecialchars($empleado['apellido']) ?></td>
            <td><?php echo htmlspecialchars($empleado['nss']) ?> </td>
            <td><input type="submit" name="editar" value="Editar" /></td>
        </tr>
        <input type="hidden" name="empleadoAEditar" value="<?php echo htmlspecialchars($empleado['nombre']),",",htmlspecialchars($empleado['apellido']),",",htmlspecialchars($empleado['nss']) ?>" />
    </form>
    <?php
}
echo "</table>";
echo "</div>";

include "pie.php";
?>