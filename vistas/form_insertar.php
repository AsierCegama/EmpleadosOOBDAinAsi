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

  if (isset($resultado))
  {
  echo "<h3 class='text-success'>$resultado</h3>";
  }
 */
?>

<div class='table-responsive' id="divInserto">

    <form name='formu' action='index.php' method='post' >
        <table class='table table-hover'>
            <tr>
                <th><label>Nombre</label></th>
            </tr>
            <tr>
                <td>
                    <input type='text' name='nombre' value="<?php echo Input::get('nombre') ?>" >

                </td>
            </tr>
            <tr>
                <th><label>Apellido</label></th>
            </tr>
            <tr>
                <td>
                    <input type='text' name='apellido' value="<?php echo Input::get('apellido') ?>" >

                </td>
            </tr>
            <tr>
                <th><label>NSS</label></th>
            </tr>
            <td>
                <input type='text' name='nss' value="<?php echo Input::get('nss') ?>" >
            </td>
            </tr>
            <tr>
                <th><label>Fijo</label></th>
            </tr>
            <tr>
                <td>
                    <input type='text' name='fijo' value="<?php echo Input::get('fijo') ?>" >

                </td>
            </tr>
            <tr>
                <th><label>Ventas</label></th>
            </tr>
            <tr>
                <td>
                    <input type='text' name='ventas' value="<?php echo Input::get('ventas') ?>" >

                </td>
            </tr>
            <tr>
                <th><label>Tarifa por comision</label></th>
            </tr>
            <td>
                <select name='tarifa' >

                    <?php
                    $tarifa = [2,6,10,14,18,22,26,30];
                    for ($i = 0; $i < count($tarifa); $i++) {
                        echo "<option value='" . $tarifa[$i] . "'";
                        echo Utilidades::verificarLista(Input::get('tarifa'), $tarifa[$i]);
                        echo ">" . $tarifa[$i]. "</option>";
                    }
                    ?>



                    <!--    
                        <option value="<?php echo Input::get('tarifa') ?>">1</option>
                        <option value="<?php echo Input::get('tarifa') ?>">2</option>
                    -->
                </select>

                <!--
                <input type='text' name='tarifa' value="<?php echo Input::get('tarifa') ?>" >
                -->

            </td>
            </tr>
            <tr>
                <th colspan="3"><label>Localiza</label></th>
            </tr>
            <tr>
                <td colspan="3">
                    <label>Nacional </label><input type="checkbox" name="localiza[]" value="nacional" >
                    <label>Internacional </label><input type="checkbox" name="localiza[]" value="internacional" >            
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type='submit' name='enviarInserto' value='Enviar' >
                </td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($respuestaInserto)) {
        echo $respuestaInserto;
        $respuestaInserto = "";
    }
    include "pie.php";
    ?>
