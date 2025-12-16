<?php

require_once('persistencia/Conexion.php');
require_once('persistencia/VueloDAO.php');

class Vuelo
{
    private $idVuelo;
    private $avion;
    private $piloto;
    private $copiloto;
    private $origen;
    private $destino;
    private $estado;
    private $hora;
    private $fecha;
    private $cantidad_Pas;

    public function __construct(
        $idVuelo = "",
        $avion = "",
        $piloto = "",
        $copiloto = "",
        $origen = "",
        $destino = "",
        $estado = "",
        $hora = "",
        $fecha = "",
        $cantidad_Pas = 0
    ) {
        $this->idVuelo = $idVuelo;
        $this->avion = $avion;
        $this->piloto = $piloto;
        $this->copiloto = $copiloto;
        $this->origen = $origen;
        $this->destino = $destino;
        $this->estado = $estado;
        $this->hora = $hora;
        $this->fecha = $fecha;
        $this->cantidad_Pas = $cantidad_Pas;
    }

    // ----- GETTERS -----
    public function getIdVuelo()
    {
        return $this->idVuelo;
    }

    public function getAvion()
    {
        return $this->avion;
    }

    public function getPiloto()
    {
        return $this->piloto;
    }

    public function getCopiloto()
    {
        return $this->copiloto;
    }

    public function getOrigen()
    {
        return $this->origen;
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getCantidadPasajeros()
    {
        return $this->cantidad_Pas;
    }

    // ----- SETTERS (si los quieres quitar me dices) -----
    public function setIdVuelo($idVuelo)
    {
        $this->idVuelo = $idVuelo;
    }

    public function setAvion($avion)
    {
        $this->avion = $avion;
    }

    public function setPiloto($piloto)
    {
        $this->piloto = $piloto;
    }

    public function setCopiloto($copiloto)
    {
        $this->copiloto = $copiloto;
    }

    public function setOrigen($origen)
    {
        $this->origen = $origen;
    }

    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setCantidadPasajeros($cantidad)
    {
        $this->cantidad_Pas = $cantidad;
    }

    public function consultarVuelos()
    {
        $conexion = new Conexion();
        $vueloDAO = new VueloDAO();
        $conexion->abrir();
        $conexion->ejecutar($vueloDAO->consultarVuelos());
        $listaVuelos = array();
        while (($dato = $conexion->registro()) != null) {
            $vuelo = new Vuelo(
                $dato[0],
                $dato[7],
                $dato[1],
                $dato[2],
                $dato[5],
                $dato[6],
                $dato[9],
                $dato[4],
                $dato[3],
                $dato[8]
            );
            array_push($listaVuelos, $vuelo);
        }
        $conexion->cerrar();
        return $listaVuelos;
    }
    public function consultarVuelosProximos()
    {
        $conexion = new Conexion();
        $vueloDAO = new VueloDAO();
        $conexion->abrir();
        $conexion->ejecutar($vueloDAO->consultarVuelosProximos());
        $listaVuelos = array();
        while (($dato = $conexion->registro()) != null) {
            $vuelo = new Vuelo(
                $dato[0],
                "",
                "",
                "",
                $dato[1],
                $dato[2],
                "",
                $dato[4],
                $dato[3]
            );
            array_push($listaVuelos, $vuelo);
        }
        $conexion->cerrar();
        return $listaVuelos;
    }

    public function insertarVuelo()
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $vueloDAO = new VueloDAO(
            $this->idVuelo,
            $this->avion,
            $this->piloto,
            $this->copiloto,
            $this->origen,
            $this->destino,
            $this->estado,
            $this->hora,
            $this->fecha,
            $this->cantidad_Pas
        );
        $res = $conexion->ejecutarTF($vueloDAO->insertarVuelo());
        $conexion->cerrar();
        return $res;
    }

    public function actualizarVuelo()
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $vueloDAO = new VueloDAO(
            $this->idVuelo,
            $this->avion,
            $this->piloto,
            $this->copiloto,
            $this->origen,
            $this->destino,
            $this->estado,
            $this->hora,
            $this->fecha,
            $this->cantidad_Pas
        );
        $res = $conexion->ejecutarTF($vueloDAO->actualizarVuelo());
        $conexion->cerrar();
        return $res;
    }

    public function consultarPorOrigen()
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $vueloDAO = new VueloDAO();
        $conexion->ejecutar($vueloDAO->consultarProOrigen());
        $vuelos = array();
        while (($tupla = $conexion->registro()) != null) {
            $vuelos[] = $tupla;
        }
        $conexion->cerrar();
        return $vuelos;
    }
}


/*
select 
v.idVuelo, 
p.nombres as piloto, 
cp.nombres as copiloto, 
v.fecha, 
v.hora, 
ori.nombreAeropuerto as origen, 
des.nombreAeropuerto as destino, 
v.idAvion as avion,
av.capacidadPasajeros as `capacidad pasajeros`
FROM
GrAlt_Vuelo v
INNER JOIN GrAlt_Piloto p on v.idPiloto = p.idPiloto
INNER JOIN GrAlt_Piloto cp on v.idCopiloto = cp.idPiloto
INNER JOIN GrAlt_Aeropuerto ori on v.idOrigen = ori.idAeropuerto
INNER JOIN GrAlt_Aeropuerto des on v.idDestino = des.idAeropuerto
INNER JOIN GrAlt_Avion av on v.idAvion = av.idAvion
ORDER BY v.idVuelo;
*/
