<?php

include "config/config.php";

/**
 * Description of DataBase
 * Se conecta y desconecta a la base de datos,
 * ejecuta sentencias sql
 * @author Alumno
 */
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
        try {
            $resul = $this->conexion->prepare($sql);
            $resul->execute($args);
        } catch (Exception $ex) {
            $resultado = "Se ha producido un ERROR. Contacte con el servicio;"; //$ex->getMessage();
            include "vistas/resultado.php";
            exit();
        }
    }

    public function cantidadFilas($resul)
    {
        return $resul->rowcount();
    }

}
