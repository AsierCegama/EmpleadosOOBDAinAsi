<?php
class EmpleadoPorComision extends Empleado
{
    private $ventasbrutas;
    private $tarifacomision;
    
    function __construct($nombre, $apellido, $nss, $fijo, $localizacion, $ventasbrutas, $tarifacomision) {
        parent::__construct($nombre, $apellido, $nss, $fijo, $localizacion);
        $this->ventasbrutas = $ventasbrutas;
        $this->tarifacomision = $tarifacomision;
    }
    
    function getVentasbrutas() {
        return $this->ventasbrutas;
    }

    function getTarifacomision() {
        return $this->tarifacomision;
    }

    function setVentasbrutas($ventasbrutas) {
        $this->ventasbrutas = $ventasbrutas;
    }

    function setTarifacomision($tarifacomision) {
        $this->tarifacomision = $tarifacomision;
    }



}
?>
