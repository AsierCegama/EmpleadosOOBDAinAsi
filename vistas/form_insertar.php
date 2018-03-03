<?php
include "cabecera.php";
//include '../helper/utilidades.php';
/*
 * if (empty($empleados))

  {
  echo "<h3 class='text-danger'>$error</h3>";
  include "pie.php";
  exit();
  }


  echo "<h1>Aquí se listan los empleados</h1>";
*/
  if (isset($respuestaInserto))
  {
  echo "<h3 class='text-success'>$respuestaInserto</h3>";
  }



if (isset($validador))  // ha habido envío //también if (isset($validador)) 
{

    $errores = $validador->getErrores();
    if (!empty($errores))
    {
        echo "<br />";
        echo "<div class='alert alert-warning' role='alert'>";
        foreach ($errores as $campo => $mensajeError)
        {
            echo "<p>$mensajeError</p>\n";
        }
        echo "</div>";
    }
}
?>



<form name='formu' action='index.php' method='post' >
    <div class="form-group" >

        <label class="form-label">Nombre</label>

        <input type='text' class="form-control" name='nombre' value="<?php echo htmlspecialchars(Input::get('nombre')) ?>" >

        <label class="form-label">Apellido</label>

        <input type='text' class="form-control" name='apellido' value="<?php echo htmlspecialchars(Input::get('apellido')) ?>" >

        <label class="form-label">NSS</label>

        <input type='text' class="form-control" name='nss' value="<?php echo htmlspecialchars(Input::get('nss')) ?>" >

        <label class="form-label">Fijo</label>

        <input type='text' class="form-control" name='fijo' value="<?php echo Input::get('fijo') ?>" >

        <label>Ventas</label>

        <input type='text' class="form-control" name='ventas' value="<?php echo Input::get('ventas') ?>" >

        <label class="form-label">Tarifa por comision</label>
        <select name='tarifa' class="form-control">

            <?php
            $tarifa = [2, 6, 10, 14, 18, 22, 26, 30];
            for ($i = 0; $i < count($tarifa); $i++) {
                echo "<option value='" . $tarifa[$i] . "'";
                echo Utilidades::verificarLista(Input::get('tarifa'), $tarifa[$i]);
                echo ">" . $tarifa[$i] . "</option>";
            }
            ?>
        </select>



        <label class="form-label">Localiza</label>
        <br />

        <label  class="checkbox-inline form-label"><input type="checkbox" name="localiza[]" value="nacional" 
            <?php if (isset($_POST["localiza"])){
                Utilidades::verificarCheckbox($_POST["localiza"], "nacional");} ?>
            >Nacional</label>
        <label class="form-label checkbox-inline"><input type="checkbox" name="localiza[]" value="internacional" 
            <?php if (isset($_POST["localiza"])){
                Utilidades::verificarCheckbox($_POST["localiza"], "internacional");} ?>
            >Internacional</label>
        <br /><br />
        <input type='submit' class="btn btn-primary" name='enviarInserto' value='Enviar' >

    </div>
</form>
<?php
//if (isset($respuestaInserto)) {
//    echo $respuestaInserto;
//    $respuestaInserto = "";
//}
include "pie.php";
?>
