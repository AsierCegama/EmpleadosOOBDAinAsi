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
                <!--?php echo Input::get('nombre') ? pinta el dato si este se ha escrito-->
            </div>

            <!-- COMPLETAR FORMULARIO   -->
            
            
            
            
            
            
            
            
    </fieldset>
</article>

<?php
include "pie.php";
?>
