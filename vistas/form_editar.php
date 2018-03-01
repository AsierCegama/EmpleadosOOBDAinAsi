<?php
include "cabecera.php";

//include "helper/Input.php";

echo "<h1>Editar un empleado</h1>";


if (isset($validador)) {  // ha habido envío //también if (isset($validador)) 
    $errores = $validador->getErrores();
    if (!empty($errores)) {
        echo "<br />";
        echo "<div class='alert alert-warning' role='alert'>";
        foreach ($errores as $campo => $mensajeError) {
            echo "<p>$mensajeError</p>\n";
        }
        echo "</div>";
    }
}
/*
  if (isset($resultado) && $resultado == "repetir") {
  $errores = $validador->getErrores();
  echo "<div class='text-danger'>";
  foreach ($errores as $campo => $mensajeError) {
  echo "<h3>$mensajeError</h3>";
  }
  echo "</div>";
  }
 */
?>

<article>
    <fieldset>
        <!-- DEBEN GUARDARSE LOS DATOS DE LA PERSONA A EDITAR -->

        <form action="" method="POST">
            <div class="form-group">
                <label class="control-label">Nombre</label>
                <input class="form-control" type="text" name="nombre" placeholder="Escribe tu nombre" value="<?php echo htmlspecialchars(Input::get('nombre')); ?>"/>
                <label class="control-label">Apellido</label>
                <input class="form-control" type="text" name="apellido" placeholder="Escribe tu apellido" value="<?php echo htmlspecialchars(Input::get('apellido')); ?>"/>
                <label class="control-label">Nss</label>
                <input class="form-control" type="text" name="nss" placeholder="Escribe tu nss" value="<?php echo htmlspecialchars(Input::get('nss')); ?>"/>
                <label class="control-label">Fijo</label>
                <input class="form-control" type="text" name="fijo" placeholder="Escribe tu salario fijo" value="<?php echo htmlspecialchars(Input::get('fijo')); ?>"/>
                <label class="control-label">Ventas</label>
                <input class="form-control" type="text" name="ventas" placeholder="Escribe las ventas realizadas" value="<?php echo htmlspecialchars(Input::get('ventas')); ?>"/>
                <label class="control-label">Tarifa</label>
                <select name='tarifa' class="form-control">

                    <?php
                    $tarifa = [2, 6, 10, 14, 18, 22, 26, 30];
                    for ($i = 0; $i < count($tarifa); $i++) {
                        echo "<option value='" . $tarifa[$i] . "'";
                        echo Utilidades::verificarLista(Input::get('tarifa'), $tarifa[$i]);
                        if($_POST['tarifa'] == $tarifa[$i]){
                            echo "selected >" . $tarifa[$i] . "</option>";
                        }else{
                            echo ">" . $tarifa[$i] . "</option>";
                        }
                    }
                    
                    ?>
                </select>
                <label class="control-label">Localizacion</label>
                <br />

                <label  class="checkbox-inline form-label"><input type="checkbox" name="localiza[]" value="nacional" >Nacional</label>
                <label class="form-label checkbox-inline"><input type="checkbox" name="localiza[]" value="internacional" >Internacional</label>
                <br />
                <input type="submit" name="editando" value="editando" />
                <!--?php echo Input::get('nombre') ? pinta el dato si este se ha escrito-->
            </div>
        </form>
    </fieldset>
</article>

<?php
include "pie.php";
?>
