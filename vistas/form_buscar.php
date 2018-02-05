<?php
include "cabecera.php";
include "helper/Input.php";
?>

<h1>Buscar un empleado</h1>
<article>
    <h4 class="text-warning">
        Introduca el texto de búsqueda 
        y se mostrarán Los empleados que lo contengan en 
        su nombre y/o apellido
    </h4>
    <form action="?" method="POST">
        <div class="form-group">
            <label class="form-label">Palabra clave</label>
            <input class="form-control" type="text" name="texto" required="required" placeholder="ALGÚN DATO" value="<?php echo Input::get('texto') ?>"/>
        </div>     
        <input class="btn btn-primary" type="submit" name="buscar" value="Buscar" />
    </form>
</article>

<?php
if (isset($empleados))
{
    if (!empty($empleados))
    {
        echo "<h3>Coincidencias</h3>";
        echo "<div class='row'>";
        echo "<div class='table-responsive col-md-8 col-md-offset-2'>";
        echo "<table class='table table-striped'><tr><th>Nombre</th><th>Apellido</th><th>Ingresos</th></tr>";
        foreach ($empleados as $empleado)
        {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($empleado['nombre']) ?></td>
                <td><?php echo htmlspecialchars($empleado['apellido']) ?> </td>
                <td><?php echo $empleado['ingresos'] . " €" ?> </td>
            </tr>
            <?php
        }
        echo "</table>";
        echo "</div>";
        echo "</div>";
    } else
    {
        $error = "No existen coincidencias en la base de datos";
        echo "<div class='errores'><h3>$error</h3></div>";
    }
}
include "pie.php";
?>