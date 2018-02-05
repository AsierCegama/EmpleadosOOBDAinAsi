<?php
//error_reporting(0);  // Cuando se quiera Publicar/Desplegar se descomenta
include "controladores/Controlador.php";
$controlador = new Controlador();
$controlador->run();
?>