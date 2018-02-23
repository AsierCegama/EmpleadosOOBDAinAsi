<?php

/*
 * No lo utilizamos en el primer ejemplo de validación
 */

class Utilidades
{

    public static function filtrarDato($dato)
    {
        //Con las funciones que se necesiten
        return htmlspecialchars($dato, ENT_QUOTES, 'UTF-8');
    }

    public static function verArray($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
    
    public static function verificarLista($valor, $valorMenu)
    {
        if($valor == $valorMenu){
            echo "selected='selected'";
        }
    }
    
    public static function verificarBotones($valor, $valorBot)
    {
        if($valor == $valorBot){
            echo "checked='checked'";
        }
    }
    
    public static function verificarCheckbox($valores, $valorCheck)
    {
        if (!empty($valores)) {
            if (in_array($valorCheck, $valores)) {
                echo "checked='checked'";
            }
        }
    }

}
