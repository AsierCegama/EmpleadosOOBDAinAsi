<?php

/**
 * Description of ValidadorForm
 *
 * @author Alumno
 */
class ValidadorForm
{

    private $errores;
    private $reglasValidacion;
    private $valido;

    public function __construct()
    {
        $this->errores = array();
        $this->reglasValidacion = null;
        $this->valido = false;
    }

    public function validar($fuente, $reglasValidacion)
    {
        foreach ($reglasValidacion as $nombreCampo => $reglasCampo)
        {
            foreach ($reglasCampo as $nombreRegla => $valorRegla)
            {
               
                
              //Comprobar si se cumplen las reglas de validación establecidas  
                
                
                
                
                
                
                
            }
        }
        if (count($this->errores) === 0)
        {
            $this->valido = true;
        }
    }

    public function addError($nombreCampo, $error)
    {
        $this->errores[$nombreCampo] = $error;
    }

    public function esValido()
    {
        return $this->valido;
    }

    public function getErrores()
    {
        return $this->errores;
    }

    public function getMensajeError($campo)
    {
        if(isset($this->errores[$campo]))
        {
            return $this->errores[$campo];
        }
        return "";
    }

}
