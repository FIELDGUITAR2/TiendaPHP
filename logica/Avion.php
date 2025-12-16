<?php
require_once('persistencia/AvionDAO.php');
require_once('persistencia/Conexion.php');
class Avion
{
    private $id;
    private $tipoAvion;
    private $nombreAvion;
    private $capPasajeros;
    private $cantCombustible;

    public function __construct(
        $id = 0,
        $tipoAvion = "",
        $nombreAvion = "",
        $capPasajeros = "",
        $cantCombustible = ""
    ) {
        $this->id = $id;
        $this->tipoAvion = $tipoAvion;
        $this->nombreAvion = $nombreAvion;
        $this->capPasajeros = $capPasajeros;
        $this->cantCombustible = $cantCombustible;
    }

    /* ============================
       GETTERS Y SETTERS
       ============================ */

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTipoAvion()
    {
        return $this->tipoAvion;
    }
    public function setTipoAvion($tipoAvion)
    {
        $this->tipoAvion = $tipoAvion;
    }

    public function getNombreAvion()
    {
        return $this->nombreAvion;
    }
    public function setNombreAvion($nombreAvion)
    {
        $this->nombreAvion = $nombreAvion;
    }

    public function getCapPasajeros()
    {
        return $this->capPasajeros;
    }
    public function setCapPasajeros($capPasajeros)
    {
        $this->capPasajeros = $capPasajeros;
    }

    public function getCantCombustible()
    {
        return $this->cantCombustible;
    }
    public function setCantCombustible($cantCombustible)
    {
        $this->cantCombustible = $cantCombustible;
    }

    public function insertarAvion()
    {
        $conexion = new Conexion();
        $avionDAO = new AvionDAO(
            "",
            $this->getTipoAvion(),
            $this->getNombreAvion(),
            $this->getCapPasajeros(),
            $this->getCantCombustible()
        );
        $conexion->abrir();
        $res = $conexion->ejecutarTF($avionDAO->insetarAvion());
        $conexion->cerrar();
        return $res;
    }

    public function consultarAviones()
    {
        $conexion = new Conexion();
        $avionDAO = new AvionDAO();
        $conexion->abrir();
        $aviones = array();
        $conexion->ejecutar($avionDAO->consultarAviones());
        while (($dato = $conexion->registro()) != null) {
            $avion = new Avion(
                $dato[0],
                $dato[4],
                $dato[1],
                $dato[2],
                $dato[3]
            );
            array_push($aviones,$avion);
        }
        $conexion->cerrar();
        return $aviones;
    }
    public function consultarAvion()
    {
        $conexion = new Conexion();
        $avionDAO = new AvionDAO();
        $avionDAO->setId($this->getId());
        $conexion->abrir();
        $conexion->ejecutar($avionDAO->consultarAvion());
        $dato = $conexion->registro();
            $avion = new Avion(
                $dato[0],
                $dato[4],
                $dato[1],
                $dato[2],
                $dato[3]
            );
        $conexion->cerrar();
        return $avion;
    }
}
