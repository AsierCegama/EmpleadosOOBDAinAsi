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
    
    public function editar($Empleado){
        $this->db->conectar();
        
        // UPDATE `empleados` SET `nombre`='Sancho',`apellido`='panza',`fijo`=100,`ventasbrutas`=100,`tarifacomision`=20,`localiza`=2 WHERE `nss` like 321654;
        
        $this -> db -> conectar();
        $sql = "UPDATE `empleados` SET `nombre`='".$Empleado->getNombre()."',`apellido`='".$Empleado->getApellido()."',`fijo`=".$Empleado->getFijo().",`ventasbrutas`=".$Empleado->getVentasbrutas().",`tarifacomision`=".$Empleado->getTarifacomision().",`localiza`=".$Empleado->getLocalizacion()." WHERE `nss` like '".$Empleado->getNss()."'";
        $result = $this -> db -> ejecutarSql($sql);
        $this -> db -> desconectar();
        return $result;
    }
    
    public function insertar($Empleado){

        $this->db->conectar();
        $sql = "INSERT INTO empleados (nombre,apellido,nss,fijo,ventasbrutas,tarifacomision,localiza) VALUES (:nombre, :apellido, :nss, :fijo,:ventasbrutas, :tarifacomision, :localiza);";
        $args = array(":nombre"=>$Empleado->getNombre(),":apellido"=>$Empleado->getApellido(),":nss"=>$Empleado->getNss(),":fijo"=>$Empleado->getFijo(),":ventasbrutas"=>$Empleado->getVentasbrutas(),":tarifacomision"=>$Empleado->getTarifacomision(),":localiza"=>$Empleado->getLocalizacion());
        $insertado = $this->db->ejecutarSqlActualizacion($sql,$args);
        $this->db->desconectar();
        return $insertado;            
    }

    public function buscar($busqueda, $valor, $localiza){
        $this->db->conectar();
        $sql = "SELECT nombre, apellido, ((fijo + (ventasbrutas * tarifacomision * 0.01)) ";
        if($localiza == 2){
             $sql.= " + 150";
        }
        $sql.= " ) ingresos FROM empleados WHERE ".$valor." LIKE '%".$busqueda."%'"
                . "AND localiza LIKE ".$localiza.";";
        $encontrado = $this->db->ejecutarSql($sql);
        $this->db->desconectar();
        return $encontrado;
    }
    
    public function eliminar($nss){
        $this->db->conectar();
        $sql = "DELETE FROM empleados WHERE nss ='".$nss."';";
        $borrado = $this->db->ejecutarSql($sql);
        $this->db->desconectar();
        return $borrado;
    }
    
    public function ingresos($valor){
        $this->db->conectar();
        $sql =" SELECT ((fijo + (ventasbrutas * tarifacomision * 0.01)) ";
        if($valor == 2){
             $sql.= " + 150";
        }
        $sql.= " ) ingresos, nombre, apellido FROM `empleados` WHERE localiza LIKE "
                .$valor." ORDER BY ingresos DESC";
        $localiza = $this -> db -> ejecutarSql($sql);
        $this->db->desconectar();
        return $localiza;
    }
    
    public function existeEmpleado($nss){
        $this->db->conectar();
        $sql = "SELECT * FROM empleados WHERE nss LIKE '" . $nss . "';";
        $result = $this->db->ejecutarSql($sql);
        $numerofilas = $this->db->cantidadFilas($result);
        $this->db->desconectar();
         return $numerofilas <> 0;
    }
    
    public function mostrarEmpleado($nss){
        $this->db->conectar();
        $sql = "SELECT * FROM empleados WHERE nss LIKE '" . $nss . "';";
        $result = $this->db->ejecutarSql($sql);
        $empleado = $result->fetch();
        $this->db->desconectar();
         return $empleado;
    }
}