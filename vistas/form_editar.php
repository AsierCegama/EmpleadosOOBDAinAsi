<?php
include "cabecera.php";

include "helper/Input.php";

echo "<h1>Editar un empleado</h1>";

if ($resultado == "repetir") {
    $errores = $validador->getErrores();
    echo "<div class='text-danger'>";
    foreach ($errores as $campo => $mensajeError) {
        echo "<h3>$mensajeError</h3>";
    }
    echo "</div>";
}
?>

<article>
    <fieldset>
        <!-- DEBEN GUARDARSE LOS DATOS DE LA PERSONA A EDITAR -->
        
        <form action="" method="POST">
            <div class="form-group">
                <label class="control-label">Nombre</label>
                <input class="form-control" type="text"name="nombre" placeholder="Escribe tu nombre" value="<?php echo $nombre; ?>"/>
                <label class="control-label">Apellido</label>
                <input class="form-control" type="text"name="apellido" placeholder="Escribe tu apellido" value="<?php echo $apellido; ?>"/>
                <label class="control-label">Nss</label>
                <input class="form-control" type="text"name="nss" placeholder="Escribe tu nss" value="<?php echo $nss; ?>"/>
                <label class="control-label">Fijo</label>
                <input class="form-control" type="text"name="fijo" placeholder="Escribe tu salario fijo" value="<?php echo $fijo; ?>"/>
                <label class="control-label">Ventas</label>
                <input class="form-control" type="text"name="ventas" placeholder="Escribe las ventas realizadas" value="<?php echo $ventas; ?>"/>
                <label class="control-label">Tarifa</label>
                <input class="form-control" type="text"name="tarifa" placeholder="Escribe tu tarifa" value="<?php echo $tarifa; ?>"/>
                <label class="control-label">Localizacion</label>
                <input class="form-control" type="text"name="localiza" placeholder="Escribe tu localizacion" value="<?php echo $localiza; ?>"/>
                <input type="submit" name="editando" value="editando" />
                <!--?php echo Input::get('nombre') ? pinta el dato si este se ha escrito-->
            </div>

            <!-- COMPLETAR FORMULARIO   -->








    </fieldset>
</article>

<?php
include "pie.php";
?>
