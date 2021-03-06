<?php

include 'modelo/DaoEmpleado.php';
include "helper/ValidadorForm.php";
include 'modelo/Empleado.php';
include 'modelo/EmpleadoPorComision.php';
include "helper/Utilidades.php";


class Controlador {

    private $dao;

    public function run() {

        //IMPLEMENTA MOSTRAR 
        //Asier
        if (isset($_GET['opcion']) && $_GET['opcion'] == "mostrar") {
            $empleados = $this->mostrar();
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
            $dao = new DaoEmpleado();
            $empleadosEditar = $dao->mostrar();
            if (!$empleadosEditar) { // ha ocurrido un error
                $error = "Error en consulta - " . mysqli_error($conexion);
                include "error.php";
                exit();
            } else {
                include "vistas/form_empleEdit.php";
            }
            exit();
        }


        if (isset($_POST['empleadoAEditar'])) {
            include 'vistas/form_editar.php';
            exit();
            //var_dump($emple);
        }
        if (isset($_POST['editando'])) {
            $this->validar('vistas/form_editar.php');
            exit();
            //var_dump($emple);
        }

        //IMPLEMENTA INSERTAR
        //Asier
        if (isset($_GET['opcion']) && $_GET['opcion'] == 'insertar') {
            //$this->mostrarFormularioInsertar();
            include "vistas/form_insertar.php";
            exit();
        }

        if (isset($_POST['enviarInserto'])) {
            $this->validar('vistas/form_insertar.php');
            exit();
        }

        //BUSCAR
        //Aingeru
        if (isset($_GET['opcion']) && $_GET['opcion'] == 'buscar') {
            include "vistas/form_buscar.php";
            exit();
        }

        if (isset($_POST['buscar'])) {
            $busqueda = htmlspecialchars($_POST['texto']);
            $dao = new DaoEmpleado();
            $buscado = $dao->buscar($busqueda, "nombre", 1);
            $parte1 = $buscado->fetchAll();
            $buscado = $dao->buscar($busqueda, "nombre", 2);
            $parte2 = $buscado->fetchAll();
            $buscar1 = array();
            if (is_array($parte1)) {
                $buscar1 = array_merge($buscar1, $parte1);
            }
            if (is_array($parte2)) {
                $buscar1 = array_merge($buscar1, $parte2);
            }
            $buscado = $dao->buscar($busqueda, "apellido", 1);
            $parte1 = $buscado->fetchAll();
            $buscado = $dao->buscar($busqueda, "apellido", 2);
            $parte2 = $buscado->fetchAll();
            $buscar2 = array();
            if (is_array($parte1)) {
                $buscar2 = array_merge($buscar2, $parte1);
            }
            if (is_array($parte2)) {
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

        if (isset($_POST['eliminar'])) {
            include "vistas/confirma_eliminar.php";
            exit();
        }

        if (isset($_POST['si'])) {
            $dao = new DaoEmpleado();
            if ($dao->eliminar($_POST['empleadoEliminar'])) {
                $resultado = "Empleado/a eliminado con éxito";
                $empleadosEliminar = $dao->mostrar();
            } else {
                $error = "Ocurrió un error";
                $empleadosEliminar = $dao->mostrar();
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

    function mostrar() {
        $dao = new DaoEmpleado();
        $empleados = $dao->mostrar();
        return $empleados;
    }

    public function crearReglasDeValidacion() {
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

    public function creaEmpleado($datos) {
        $empleado = new EmpleadoPorComision($datos['nombre'], $datos['apellido'], $datos["nss"], $datos['fijo'], count($datos['localiza']), $datos['ventas'], $datos['tarifa']);
        return $empleado;
    }

    private function validar($vista) {
        $validador = new ValidadorForm();
        $reglasValidacion = $this->crearReglasDeValidacion();
        $validador->validar($_POST, $reglasValidacion);
        if ($validador->esValido()) {
            if ($vista == 'vistas/form_insertar.php') {
                $this->registrar($validador);
                $empleados = $this->mostrar();
                include 'vistas/listar.php';
            }elseif($vista == 'vistas/form_editar.php'){
                $this->actualizarEmpleado($validador);
                $empleados = $this->mostrar();
                include 'vistas/listar.php';
            }
            //exit();
        } else {
            include $vista;
        }
    }

    function actualizarEmpleado(){
        $this->dao = new DaoEmpleado();
        $EmpleadoPorComision = $this->creaEmpleado($_POST);
        $respuestaEditar = $this->dao->editar($EmpleadoPorComision);
        
    }
    
    public function registrar($validador) {
        $this->dao = new DaoEmpleado();
        $EmpleadoPorComision = $this->creaEmpleado($_POST);

        if ($this->dao->existeEmpleado($EmpleadoPorComision->getNss())) {
            $respuestaInserto = "El NSS ya pertenece a un/a usuari@.";
            include "vistas/form_insertar.php";            
            exit();
        } else {
            $respuestaInserto = $this->dao->insertar($EmpleadoPorComision);
        }
    }

}
?>

