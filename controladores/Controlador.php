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
        //Asier
        if (isset($_GET['opcion']) && $_GET['opcion'] =="mostrar"){
            echo "Se ha pulsado mostrar ";
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
            //Se ejecuta buscar
            echo "Se ha pulsado insertar";
            exit();
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