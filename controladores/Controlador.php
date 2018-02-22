<?php
include 'modelo/DaoEmpleado.php';
include "helper/ValidadorForm.php";

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
            $this->mostrarFormularioInsertar();
            exit();
        }

        if(isset($_POST['enviarInserto'])){
            /* meter validacion. si no valida volver a vista insertar.
             * si valida, crear objeto epmleado y realizar el inserto y ir a mostrar.
             */
            if($this->validar() != 1){            
            $this->mostrarFormularioInsertar();

            exit();
            }else{
                
            }
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
        include "vistas/form_insertar.php";
    }

    public function mostrarFormularioEditar()
    {

    }
/*
 * En revision
 */
    public function crearReglasDeValidacion()
    {
        $reglasValidacion = array(
            "apellido" => array("required" => true),
            "nombre" => array("required" => true),
            "nss" => array("required" => true),
            "fijo" => array("required" => true),
            "ventas" => array("required" => true),
            "tarifa" => array("required" => true));

        return $reglasValidacion;
    }

    public function creaEmpleado($datos)
    /*
     */
    { 
        $empleado = new EmpleadoPorComision($datos['nombre'],$datos['apellido'],$datos["snn"],$datos['fijo'],
                $datos['ventas'],$datos['tarifa']);
        return $empleado;
    }

    
    /*
     * En revision
     */
    
    private function validar()
    {
        $validador = new ValidadorForm();
        $reglasValidacion = $this->crearReglasDeValidacion();
        $validador->validar($_POST, $reglasValidacion);
        if ($validador->esValido()) {
        $this->registrar($validador);
        exit();
        }
    //Al menos estos métodos
}

    public function registrar($validador){
        $this->dao = new DaoEmpleado();
        $EmpleadoPorComision = $this->creaEmpleado($_POST);
        
        
        
        
        if($this->dao->existeApweb($apweb->getDNI())){
            $respuesta = "El DNI ya pertenece a un/a usuari@.";
            $this->mostrarFormulario("validar", $validador, $respuesta);
            exit();
        } else {
            $respuesta = $this->dao->insertarApweb($apweb);
            if($respuesta == "<p>Registro creado.</p>\n"){
                $this->mostrarFormulario("continuar", $validador, $respuesta);
                exit();
            } else {
                $this->mostrarFormulario("validar", $validador, $respuesta);
                exit();
            }
        }
    }




}
?>

