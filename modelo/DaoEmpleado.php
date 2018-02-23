<?php
include 'modelo/DataBase.php';
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
        //$empleados = $result->fetchAll();  --Karmele (para una sola fila devuelta ¿?)
        $this -> db -> desconectar();
        return $result;
    }
    
    public function editar(){
        
    }
    
    public function insertar($Empleado){
        /*Revisar
        $this->db->conectar();
        $sql = "insert into empleados (nombre,apellido,nss,fijo,ventasbrutas,tarifacomision,localiza)"
                . " values(?,?,?,?,?,?,?)";
        $args["nombre"] = $Empleado->getNombre();
        $args["apellido"] = $Empleado->getApellido();
        $args["nss"] = $Empleado->getNss();
        $args["fijo"] = $Empleado->getFijo();
        $args["ventas"] = $Empleado->getVentasbrutas();
        $args["tarifa"] = $Empleado->getTarifacomision();
        $args["localiza"] = 2;//$Empleado->getLocaliza();
        $resul = $this->db->ejecutarSqlActualizacion($sql,$args);
        echo $resul;
        $this->db->desconectar();
         *
         * 
         *  Provisional
         */
        $this->db->conectar();
        $sql = "INSERT INTO empleados (nombre,apellido,nss,fijo,ventasbrutas,tarifacomision,localiza)"
                . " VALUES (";
        $args = array("'".$Empleado->getNombre()."'", "'".$Empleado->getApellido()."'",
            $Empleado->getNss(),$Empleado->getFijo(),$Empleado->getVentasbrutas(),
            $Empleado->getTarifacomision(),$Empleado->getLocalizacion());
        $resul = $this->db->ejecutarSqlActualizacion($sql,$args);
        $this->db->desconectar();
        return $resul;
        
        
        
        
    }
    
    public function buscar(){
        
    }
    
    public function eliminar(){
        
    }
    
    public function ingresos1(){
        $this->db->conectar();
        $sql =" SELECT (fijo + (ventasbrutas * tarifacomision * 0.01)) ingresos,"
                . " nombre, apellido FROM `empleados` WHERE localiza LIKE 1 ORDER BY ingresos DESC";
        $localiza1 = $this -> db -> ejecutarSql($sql);
        return $localiza1;
    }
        
    public function ingresos2(){
        $sql =" SELECT ((fijo + (ventasbrutas * tarifacomision * 0.01)) + 150) ingresos,"
                . " nombre, apellido FROM `empleados` WHERE localiza LIKE 2 ORDER BY ingresos DESC";
        $localiza2 = $this -> db -> ejecutarSql($sql);
        $this->db->desconectar();
        return $localiza2;
    }
    
    public function existeEmpleado($nss){
        $this->db->conectar();
        $sql = "SELECT * FROM empleados WHERE nss LIKE '" . $nss . "';";
        $result = $this->db->ejecutarSql($sql);
        $numerofilas = $this->db->cantidadFilas($result);
        $this->db->desconectar();
         return $numerofilas <> 0;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

