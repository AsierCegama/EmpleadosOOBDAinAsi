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
        
        //IMPLEMENTA INSERTAR
        
        //IMPLEMENTA BUSCAR
        
        //IMPLEMENTA MOSTRAR POR INGRESOS
        
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