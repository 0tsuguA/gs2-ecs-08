<?php

class Titular
{
    public $Direccion;
    public $NroDocumento;
    public $ApellidoNombre;
    public function ValidarDatos()
    {
        $mensaje = null;

        if ($this->Direccion == null) {
            $mensaje = 'La dirección es obligatoria';
        }

        if ($this->NroDocumento == null) {
            $mensaje = $mensaje . ' - El numero de documento es obligatorio';
        }

        if ($this->ApellidoNombre == null) {
            $mensaje = $mensaje . ' - El apellido y el nombre son obligatorios';
        }

        return $mensaje;
    }
}
