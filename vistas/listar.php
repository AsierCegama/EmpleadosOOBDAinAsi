<?php
include "cabecera.php";

if (empty($empleados))
{
    echo "<h3 class='text-danger'>$error</h3>";
    include "pie.php";
    exit();
}


echo "<h1>Aquí se listan los empleados</h1>";

if (isset($resultado))
{
    echo "<h3 class='text-success'>$resultado</h3>";
}


echo "<div class='table-responsive'>";
echo "<table class='table table-hover'><tr><th>Nombre</th><th>Apellido</th><th>NSS</th><th>Fijo</th><th>Tarifa por comision</th><th>Ventas brutas</th></tr>";
//$empleados -> fetchAll();
foreach ($empleados as $empleado)
{
    ?>
    <tr>
        <td><?php echo htmlspecialchars($empleado['nombre']) ?></td>
        <td><?php echo htmlspecialchars($empleado['apellido']) ?> </td>
        <td><?php echo htmlspecialchars($empleado['nss']) ?> </td>
        <td><?php echo htmlspecialchars($empleado['fijo']) ?></td>
        <td><?php echo htmlspecialchars($empleado['tarifacomision']) ?> </td>
        <td><?php echo htmlspecialchars($empleado['ventasbrutas']) ?> </td> 
    </tr>
    <?php
}
echo "</table>";
echo "</div>";

include "pie.php";
?>