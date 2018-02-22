<?php
include "cabecera.php";

if (empty($ingresosEmpleados1) || empty($ingresosEmpleados2))
{
    echo "<h3 class='text-danger'>$error</h3>";
    include "pie.php";
    exit();
}

echo "<h1>Lista de los empleados en relación a sus ingresos</h1>";

//if (isset($ingresosEmpleados))
//{
//    echo "<h3 class='text-success'>$resultado</h3>";
//}

echo "<div class='table-responsive'>";
echo "<table class='table table-hover'><tr><th>Trabajadores con una localización</th></tr>";
echo "<tr><th>Ingresos</th><th>Nombre</th><th>Apellido</th></tr>";
//$empleados -> fetchAll();
foreach ($ingresosEmpleados1 as $empleado)
{
    ?>
    <tr>
        <td><?php echo htmlspecialchars($empleado['ingresos']) ?> </td>
        <td><?php echo htmlspecialchars($empleado['nombre']) ?></td>
        <td><?php echo htmlspecialchars($empleado['apellido']) ?> </td>
    </tr>
    <?php
}
echo "<tr><th>Trabajadores de ámbito nacional e internacional</th></tr>";
echo "<tr><th>Ingresos</th><th>Nombre</th><th>Apellido</th></tr>";
foreach ($ingresosEmpleados2 as $empleado)
{
    ?>
    <tr>
        <td><?php echo htmlspecialchars($empleado['ingresos']) ?> </td>
        <td><?php echo htmlspecialchars($empleado['nombre']) ?></td>
        <td><?php echo htmlspecialchars($empleado['apellido']) ?> </td>
    </tr>
    <?php
}
echo "</table>";
echo "</div>";

include "pie.php";
?>