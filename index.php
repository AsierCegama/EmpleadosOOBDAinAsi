<?php
//error_reporting(0);  // Cuando se quiera Publicar/Desplegar se descomenta
require_once 'config/config.php';

include "controladores/Controlador.php";
$controlador = new Controlador();
$controlador->run();
?>