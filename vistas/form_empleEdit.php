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
echo "<table class='table table-hover'><tr><th>Nombre</th><th>Apellido</th><th>NSS</th><th>Fijo</th><th>Tarifa por comision</th><th>Ventas brutas</th><th>Acción</th></tr>";
//$empleados -> fetchAll();
foreach ($empleadosEditar as $empleado) {
?>
    <form action="index.php" method="post">
        <tr>
            <td><?php echo htmlspecialchars($empleado['nombre']) ?></td>
            <td><?php echo htmlspecialchars($empleado['apellido']) ?></td>
            <td><?php echo htmlspecialchars($empleado['nss']) ?> </td>
            <td><?php echo htmlspecialchars($empleado['fijo']) ?></td>
            <td><?php echo htmlspecialchars($empleado['tarifacomision']) ?> </td>
            <td><?php echo htmlspecialchars($empleado['ventasbrutas']) ?> </td>
            <td><input type="submit" name="editar" value="Editar" /></td>
        </tr>
        <input type="hidden" name="empleadoAEditar" value="si" />
        <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($empleado['nombre'])?>" />
        <input type="hidden" name="apellido" value="<?php echo htmlspecialchars($empleado['apellido'])?>" />
        <input type="hidden" name="nss" value="<?php echo htmlspecialchars($empleado['nss'])?>" /> 
        <input type="hidden" name="fijo" value="<?php echo htmlspecialchars($empleado['fijo'])?>" />
        <input type="hidden" name="tarifa" value="<?php echo htmlspecialchars($empleado['tarifacomision'])?>" />
        <input type="hidden" name="ventas" value="<?php echo htmlspecialchars($empleado['ventasbrutas'])?>" /> 
    </form>
    <?php
}
echo "</table>";
echo "</div>";

include "pie.php";
?>