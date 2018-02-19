<?php
include 'config/config.php';
class DataBaseinclude
{
    private $conexion;
    
    public function conectar(){
        try {
            $this->conexion = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            // Se puede configurar el objeto
            $this->conexion->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $this->conexion->exec("set names utf8mb4");
            return($this->conexion);
            
        } catch (PDOException $e) {
            echo " <p>Error: " . $e->getMessage() . "</p>\n";
            exit();
        }
    }
    
    public function desconectar(){
        $this -> conexion = null;
    }
    
    public function ejecutarSql($sql){
        try {
            $result = $this->conexion->prepare($sql);
            $result->execute();
            return $result;
            
        } catch (mysqli_sql_exception $ex) {
            echo "Error en ejecutarSql: ".$ex->getMessage();
        }
    }
    
    public function ejecutarActualizacion($sql){
        try {
            $result = $this->conexion->prepare($sql);
            $resultado = $result->execute($args);
            
            
        } catch (mysqli_sql_exception $ex) {
            return "Error en el inserto en ejecutarSqlActualizacion: " + $ex;
        }
        return "Inserccion realizada correctamente";
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

