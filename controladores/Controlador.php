<?php

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
        if (isset($_POST['oper']) && $_GET["opcion"]=="mostrar")
        
        //IMPLEMENTA EDITAR
        if (isset($_GET['oper']) == 'editar') {
            //Se ejecuta editar
            echo "Se ha pulsado Editar";
            exit();
        }
        //IMPLEMENTA INSERTAR
        
        //IMPLEMENTA BUSCAR
        if (isset($_GET['oper']) == 'buscar') {
            //Se ejecuta buscar
            echo "Se ha pulsado Buscar";
            exit();
        }
        //IMPLEMENTA MOSTRAR POR INGRESOS
        if (isset($_GET['opcion']) == 'mostrar') {
            //Se ejecuta mostrar
            echo "Se ha pulsado mostrar " . $_GET['opcion'];
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