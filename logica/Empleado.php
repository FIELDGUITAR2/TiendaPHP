<?php
require_once("persistencia/Conexion.php");
require_once("persistencia/EmpleadoDAO.php");
require_once("logica/Persona.php");
class Empleado extends Persona
{
    private $idEmpleado;
    private $clave;

    public function _construct(
        $idEmpleado = "", 
        $clave = "", 
        $id = "", 
        $nombre = "", 
        $idId = "", 
        $correo = "", 
        $telefono = "", 
        $direccion = ""
        ){
        parent::__construct($id, $nombre, $idId, $correo, $telefono, $direccion);
        $this->idEmpleado = $idEmpleado;
        $this->clave = $clave;
    }
    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setIdEmpleado($idEmpleado)
    {
        $this->idEmpleado = $idEmpleado;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function autenticar()
    {
        $conexion = new Conexion();
        $empleadoDAO = new EmpleadoDAO("", "", "", "", "", "", $this->idEmpleado, $this->clave);
        $conexion->abrir();
        $conexion->ejecutar($empleadoDAO->Autenticar());
        if ($conexion->filas() == 1) {
            $this->Id = $conexion->registro()[0];
            $conexion->cerrar();
            return true;
        } else {
            $conexion->cerrar();
            return false;
        }
    }

    public function MostrarEmpleados()
    {
        $empleadoDAO = new EmpleadoDAO();
        $conexion = new Conexion();
        $conexion->abrir();
        $conexion->ejecutar($empleadoDAO->MostrarEmpleados());
        $empleados = [];
        while (($datos = $conexion->registro()) != null) {
            $empleado = new Empleado(
                $datos[0],
                $datos[2],
                "",
                $datos[3],
                $datos[4],
                $datos[5],
            );
            $empleado->setIdEmpleado($datos[1]);
            array_push($empleados,$empleado);
        }
        $conexion->cerrar();
        return $empleados;

    }
}

?>