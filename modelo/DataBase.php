<?php
class DataBase
{

    private $conexion;

    public function conectar()
    {
        try {
            $this->conexion = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $this->conexion->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $this->conexion->exec('SET names utf8');
        } catch (Exception $ex) {
            $resultado = "Se ha producido un ERROR. Contacte con el servicio;"; //$ex->getMessage();
            include "vistas/resultado.php";
            exit();
        }
    }

    public function desconectar()
    {
        $this->conexion = null;
    }

    public function ejecutarSql($sql)
    {
        try {
            $result = $this->conexion->query($sql);
            return $result;
        } catch (Exception $ex) {
            $resultado = "Se ha producido un ERROR. Contacte con el servicio;"; //$ex->getMessage();
            include "vistas/resultado.php";
            exit();
        }
    }

    public function ejecutarSqlActualizacion($sql, $args)
    {
        $result = $this->conexion->prepare($sql);
        foreach($args as $campo => $dato){ 
            $result->bindParam($campo,$dato);
        }
        if ($result->execute($args)) {
            $resultado = "<p>Registro creado.</p>\n";
        } else {
            $resultado = "<p>No se creó el registro.<p>\n";
        }
        return $resultado;
        
    }
    
    public function cantidadFilas($rst){
        return $rst->rowCount();
    }

}
