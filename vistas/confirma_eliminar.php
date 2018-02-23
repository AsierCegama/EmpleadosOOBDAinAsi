<?php
include "cabecera.php";

echo "<h1>Confirmación: ¿realmente desea eliminar el/la empleado/a?</h1>";
echo "<h3>No podrá deshacer los cambios</h3><br /><br />";
$dao = new DaoEmpleado;
$empleado = $dao->mostrarEmpleado($_POST['empleadoEliminar']);
?>
<form action="index.php" method="post">
    <center>
        <label><?php echo $empleado['nombre']; ?></label>
        <label><?php echo $empleado['apellido']; ?></label><br /><br />
    <input type="submit" name="si" value="Si" width="10" />&nbsp;&nbsp;
    <input type="submit" name="no" value="No" width="10" />
    </center>
    <input type="hidden" name="empleadoEliminar" value="<?php echo htmlspecialchars($empleado['nss']) ?>" />
</form>

<?php
include "pie.php";
?>