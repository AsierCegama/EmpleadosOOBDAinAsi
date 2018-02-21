<?php
include 'clases/DaoEmpleado.php';
//include "helper/ValidadorForm.php";
//include "modelo/DaoEmpleadoPComision.php";
//include "modelo/EmpleadoPComision.php";

/**
 * Description of Controlador
 *
 * @author DWES
 */
class Controlador
{

    private $dao;

    public function run()
    {

        //IMPLEMENTA MOSTRAR 
        //Asier
        if (isset($_GET['opcion']) && $_GET['opcion'] =="mostrar"){

   
        $dao = new DaoEmpleado();
        $empleados = $dao -> mostrar();
        if (!$empleados) // ha ocurrido un error
        {
            $error = "Error en consulta - ".mysqli_error($conexion);
            include "error.php";
            exit();
        }else{
            include "vistas/listar.php";
        }

            
            exit();
        }
        //IMPLEMENTA EDITAR
        //Asier
        if (isset($_GET['opcion']) && $_GET['opcion'] == 'editar') {
            //Se ejecuta editar
            echo "Se ha pulsado Editar";
            exit();
        }
        //IMPLEMENTA INSERTAR
        //Asier
        if (isset($_GET['opcion']) && $_GET['opcion'] == 'insertar') {
            /* convertir esto en vista insertar
             * 
             */
            
            $resultado = "<div class='table-responsive'>";
            $resultado .= "<form name='formu' action='index.php' method='post'><table class='table table-hover'><tr><th>Nombre</th><th>Apellido</th><th>NSS</th></tr>";
            $resultado .= "<tr><td><input type='text' name='nombre' value=''></td><td><input type='text' name='apellido' value=''></td><td><input type='text' name='nss' value=''></td></tr>";
            $resultado .= "<tr><th>Fijo</th><th>Ventas brutas</th><th>Tarifa por comision</th><th>Localiza</th></tr>";   
            $resultado .= "<tr><td><input type='text' name='fijo' value=''></td><td><input type='text' name='ventasbrutas' value=''></td><td><input type='text' name='tarifacomision' value=''></td><td><input type='text' name='localiza' value=''></td></tr>";
            $resultado .= "</table>";
            $resultado .= "<br /><input type='submit' name='enviarInserto' value='Enviar' ></form></div>";
            include 'vistas/resultado.php';
            exit();
        }

        if(isset($_POST['enviarInserto'])){
            /* meter validacion. si no valida volver a vista insertar.
             * si valida, crear objeto epmleado y realizar el inserto y ir a mostrar.
             */
            echo $_POST['nombre'];
        }
            
            
            
            
        
        //IMPLEMENTA BUSCAR
        //Aingeru
        if (isset($_GET['opcion']) && $_GET['opcion'] == 'buscar') {
            //Se ejecuta buscar
            echo "Se ha pulsado Buscar";
            exit();
        }
        //IMPLEMENTA MOSTRAR POR Eliminar
        //Aingeru
        if (isset($_GET['opcion']) && $_GET['opcion'] == 'eliminar') {
            //Se ejecuta eliminar
            echo "Se ha pulsado eliminar";
            exit();
        }
        //IMPLEMENTA MOSTRAR POR INGRESOS
        //Aingeru
        if (isset($_GET['opcion']) && $_GET['opcion'] == 'ingresos') {
            //Se ejecuta mostrar
            echo "Se ha pulsado ingresos";
            exit();
        }
        
        //INICIAR EL PROGRAMA
        if (!isset($_POST['oper'])) {
            include "vistas/inicio.php";
            exit();
        }
    }

    public function mostrarFormularioInsertar()
    {
        
    }

    public function mostrarFormularioEditar()
    {
        
    }

    public function crearReglasDeValidacion()
    {
        
    }

    public function creaEmpleado($datos)
    /*
     */
    {
        
    }

    //Al menos estos métodos
}

?>