<?php
include 'modelo/DaoEmpleado.php';
include "helper/ValidadorForm.php";
include 'modelo/Empleado.php';
include 'modelo/EmpleadoPorComision.php';
include "helper/Utilidades.php";
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
        if (isset($_GET['opcion']) && $_GET['opcion'] == "mostrar") {
            $dao = new DaoEmpleado();
            $empleados = $dao->mostrar();
            if (!$empleados) { // ha ocurrido un error
                $error = "Error en consulta - " . mysqli_error($conexion);
                include "error.php";
                exit();
            } else {
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

        if (isset($_POST['enviarInserto'])) {
            /* meter validacion. si no valida volver a vista insertar.
             * si valida, crear objeto epmleado y realizar el inserto y ir a mostrar.
             */
            if ($this->validar() != 1) {
                $this->mostrarFormularioInsertar();

                exit();
            } else {
                
            }
        }

        //BUSCAR
        //Aingeru
        if (isset($_GET['opcion']) && $_GET['opcion'] == 'buscar') {
            include "vistas/form_buscar.php";
            exit();
        }
        
        if (isset($_POST['buscar'])){
            $busqueda = htmlspecialchars($_POST['texto']);
            $dao = new DaoEmpleado();
            $buscado = $dao->buscar($busqueda, "nombre", 1);
            $parte1 = $buscado->fetchAll();
            $buscado = $dao->buscar($busqueda, "nombre", 2);
            $parte2 = $buscado->fetchAll();
            $buscar1 = array();
            if (is_array($parte1)){
                $buscar1 = array_merge($buscar1, $parte1);
            }
            if (is_array($parte2)){
                $buscar1 = array_merge($buscar1, $parte2);
            }
            $buscado = $dao->buscar($busqueda, "apellido", 1);
            $parte1 = $buscado->fetchAll();
            $buscado = $dao->buscar($busqueda, "apellido", 2);
            $parte2 = $buscado->fetchAll();
            $buscar2 = array();
            if (is_array($parte1)){
                $buscar2 = array_merge($buscar2, $parte1);
            }
            if (is_array($parte2)){
                $buscar2 = array_merge($buscar2, $parte2);
            }
            
            include "vistas/form_buscar.php";
            exit();
        }
        //ELIMINAR
        //Aingeru
        if (isset($_GET['opcion']) && $_GET['opcion'] == 'eliminar' || isset($_POST['no'])) {
            $dao = new DaoEmpleado();
            $empleadosEliminar = $dao->mostrar();
            if (!$empleadosEliminar) { // ha ocurrido un error
                $error = "Error en consulta - " . mysqli_error($conexion);
                include "error.php";
                exit();
            } else {
                include "vistas/form_eliminar.php";
            }
            exit();
        }
        
        if (isset($_POST['eliminar'])){
            include "vistas/confirma_eliminar.php";
            exit();
        }
        
        if (isset($_POST['si'])){
            $dao = new DaoEmpleado();
            if($dao->eliminar($_POST['empleadoEliminar'])){
                $resultado = "Empleado/a eliminado con éxito";
                $empleadosEliminar  = $dao->mostrar();
            } else {
                $error = "Ocurrió un error";
                $empleadosEliminar  = $dao->mostrar();
            }
            include "vistas/form_eliminar.php";
            exit();
        }
        
        //INGRESOS
        //Aingeru
        if (isset($_GET['opcion']) && $_GET['opcion'] == 'ingresos') {
            $dao = new DaoEmpleado();
            $ingresa = $dao->ingresos(1);
            $ingresosEmpleados1 = $ingresa->fetchAll();
            $ingresa = $dao->ingresos(2);
            $ingresosEmpleados2 = $ingresa->fetchAll();
            if (!$ingresosEmpleados1 || !$ingresosEmpleados2) { // ha ocurrido un error
                $error = "Error en consulta - " . mysqli_error($conexion);
                include "error.php";
                exit();
            } else {
                include "vistas/lista_ingresos.php";
            }
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
            "tarifa" => array("required" => true),
            "localiza" => array("required" => true)); 

        return $reglasValidacion;
    }

    public function creaEmpleado($datos)
    /*
     */
    { 
        
      
        
        
        $empleado = new EmpleadoPorComision($datos['nombre'],$datos['apellido'],$datos["nss"],$datos['fijo'],
                count($datos['localiza']),$datos['ventas'],$datos['tarifa']);
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
        
        if($this->dao->existeEmpleado($EmpleadoPorComision->getNss())){
            $respuestaInserto = "El NSS ya pertenece a un/a usuari@.";
            $this->mostrarFormularioInsertar();
            exit();
        } else {
  
            $respuestaInserto = $this->dao->insertar($EmpleadoPorComision);
            //$this->
                    
           
                    
                    
                    //<a href="?opcion=mostrar">Mostrar</a>
           /*
            if($respuestaInserto == "<p>Registro creado.</p>\n"){
                $this->mostrarFormulario("continuar", $validador, $respuestaInserto);
                exit();
            } else {
                $this->mostrarFormulario("validar", $validador, $respuestaInserto);
                exit();
          
            }
       
 */       }
            
    }

}
?>

