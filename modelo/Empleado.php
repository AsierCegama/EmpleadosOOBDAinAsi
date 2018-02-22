<?php
class Empleado
{
    private $nombre;
    private $apellido;
    private $nss;
    private $fijo;
    private $localizacion;
    
    function __construct($nombre, $apellido, $nss, $fijo, $localizacion) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nss = $nss;
        $this->fijo = $fijo;
        $this->localizacion = $localizacion;
    }
    
    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getNss() {
        return $this->nss;
    }

    function getFijo() {
        return $this->fijo;
    }

    function getLocalizacion() {
        return $this->localizacion;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setNss($nss) {
        $this->nss = $nss;
    }

    function setFijo($fijo) {
        $this->fijo = $fijo;
    }

    function setLocalizacion($localizacion) {
        $this->localizacion = $localizacion;
    }



}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

