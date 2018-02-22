<?php
include "cabecera.php";
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
        <th><label>Nombre</label></th><th><label>Apellido</label></th><th><label>NSS</label></th>
    </tr>
    <tr>
        <td>
            <input type='text' name='nombre' value="<?php echo Input::get('nombre') ?>" >

        </td>
        <td>
            <input type='text' name='apellido' value="<?php echo Input::get('apellido') ?>" >
           
        </td>
        <td>
            <input type='text' name='nss' value="<?php echo Input::get('nss') ?>" >
 
        </td>
    </tr>
    <tr>
        <th><label>Fijo</label></th><th><label>Ventas</label></th><th><label>Tarifa por comision</label></th>
    </tr>
    <tr>
        <td>
            <input type='text' name='fijo' value="<?php echo Input::get('fijo') ?>" >
           
        </td>
        <td>
            <input type='text' name='ventas' value="<?php echo Input::get('ventas') ?>" >
           
        </td>
        <td>
            <input type='text' name='tarifa' value="<?php echo Input::get('tarifa') ?>" >
          
        </td>
    </tr>
    <tr>
        <th colspan="3"><label>Localiza</label></th>
    </tr>
    <tr>
        <td colspan="3">
            <label>Nacional</label><input type="checkbox" name="localiza[]" value="nacional" >
            <label>Internacional</label><input type="checkbox" name="localiza[]" value="internacional" >            
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
    if(isset($respuestaInserto)){
        echo $respuestaInserto;
        $respuestaInserto = "";
    }
 include "pie.php"; 
 
?>
