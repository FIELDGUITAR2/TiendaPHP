<?php
require_once('persistencia/AeropuertoDAO.php');
require_once('persistencia/Conexion.php');
require_once('logica/Ciudad.php');
class Aeropuerto
{
    private $id;
    private $nombre;
    private $direccion;
    private $ciudad;

    public function __construct($id = "", $nombre = "", $direccion = "", $ciudad = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->ciudad = $ciudad;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function consultarListaAeropuertos()
    {
        $conexion = new Conexion();
        $aeropuertoDAO = new AeropuertoDAO();
        $conexion->abrir();
        $aeropuertos = array();
        $conexion->ejecutar($aeropuertoDAO->consultarListaAeropuertos());
        while (($dato = $conexion->registro()) != null) {
            $ciudad = new Ciudad(
                "",
                $dato[3],
                $dato[4]
            );
            $aeropuero = new Aeropuerto(
                $dato[0],
                $dato[1],
                $dato[2],
                $ciudad
            );
            array_push($aeropuertos, $aeropuero);
        }
        $conexion->cerrar();
        return $aeropuertos;
    }
}
