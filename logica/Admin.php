<?php
require_once("persistencia/Conexion.php");
require_once("persistencia/AdminDAO.php");
require_once("logica/Persona.php");

class Admin extends Persona
{
    private $idAdmin;
    private $clave;

    public function _construct($id = "", $nombre = "", $idId = "", $correo = "", $telefono = "", $direccion = "", $idAdmin = "", $clave = "")
    {
        parent::__construct($id, $nombre, $idId, $correo, $telefono, $direccion);
        $this->idAdmin = $idAdmin;
        $this->clave = $clave;
    }

    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    public function getClave()
    {
        return $this->clave;
    }


    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }


    public function autenticar()
    {
        $conexion = new Conexion();
        $adminDAO = new AdminDAO("","","","","",$this->idAdmin,$this->clave,"");
        $conexion->abrir();
        $conexion->ejecutar($adminDAO->Autenticar());
        if ($conexion->filas() == 1) {
            $this->Id = $conexion->registro()[0];
            $conexion->cerrar();
            return true;
        } else {
            $conexion->cerrar();
            return false;
        }
    }

}
?>