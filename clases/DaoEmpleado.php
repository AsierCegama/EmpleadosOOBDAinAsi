<?php
include 'clases/DataBase.php';
class DaoEmpleado
{
    
    private $db;
    
    function __construct() {
        $this->db = new DataBase();
    }
    
    public function mostrar(){
        $this -> db -> conectar();
        $sql = "select * from empleados";
        $result = $this -> db -> ejecutarSql($sql);
        $this -> db -> desconectar();
        return $result;
    }
    
    public function editar(){
        
    }
    
    public function insertar(){
        $this->db->conectar();
        $sql = "insert into empleados (nombre,apellido,nss,fijo,ventasbrutas,tarifacomision,localiza)"
                . " values(?,?,?,?,?,?,?,?)";
        $nombre = $Empleado->getNombre();
        $apellido = $Empleado->getApellido();
        $edad = $Empleado->getNss();
        $dni = $Empleado->getFijo();
        $modulo = $Empleado->getVentasbrutas();
        $nota = $Empleado->getTarifacomision();
        $curso = $Empleado->getLocaliza();
        $resul = $this->db->ejecutarActualizacion($sql,$args);
        echo $resul;
        $this->db->desconectar();
    }
    
    public function buscar(){
        
    }
    
    public function eliminar(){
        
    }
    
    public function ingresos(){
        
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

