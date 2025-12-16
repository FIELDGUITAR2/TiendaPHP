<?php
require_once('persistencia/Conexion.php');
require_once('persistencia/BoletoDAO.php');
require_once('logica/Vuelo.php');
class Boleto
{
    private $asiento;
    private $idBoleto;
    private $clase;
    private $pasajero;
    private $vuelo;
    private $precio;

    public function __construct(
        $asiento = "",
        $idBoleto = "",
        $clase = "",
        $pasajero = "",
        $vuelo = "",
        $precio = ""
    ) {
        $this->asiento   = $asiento;
        $this->idBoleto  = $idBoleto;
        $this->clase     = $clase;
        $this->pasajero  = $pasajero;
        $this->vuelo     = $vuelo;
        $this->precio    = $precio;
    }

    // ============================
    // GETTERS
    // ============================

    public function getAsiento()
    {
        return $this->asiento;
    }

    public function getIdBoleto()
    {
        return $this->idBoleto;
    }

    public function getClase()
    {
        return $this->clase;
    }

    public function getPasajero()
    {
        return $this->pasajero;
    }

    public function getVuelo()
    {
        return $this->vuelo;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    // ============================
    // SETTERS
    // ============================

    public function setAsiento($asiento)
    {
        $this->asiento = $asiento;
    }

    public function setIdBoleto($idBoleto)
    {
        $this->idBoleto = $idBoleto;
    }

    public function setClase($clase)
    {
        $this->clase = $clase;
    }

    public function setPasajero($pasajero)
    {
        $this->pasajero = $pasajero;
    }

    public function setVuelo($vuelo)
    {
        $this->vuelo = $vuelo;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function consultarBoleto()
    {

        $conexion = new Conexion();
        $boletoDAO = new BoletoDAO();
        $boletoDAO->setPasajero($this->getPasajero());
        $conexion->abrir();
        $conexion->ejecutar($boletoDAO->consultarBoleto());
        $listaBoletos = array();
        while (($dato = $conexion->registro()) != null) {
            $vuelo = new Vuelo();
            $vuelo->setHora($dato[3]);
            $vuelo->setFecha($dato[4]);
            $boleto = new Boleto(
                $dato[0],
                $dato[1],
                $dato[2],
                "",
                $vuelo,
                $dato[5]
            );
            array_push($listaBoletos, $boleto);
        }
        $conexion->cerrar();
        return $listaBoletos;
    }

    public function consultarBoletoFPDF()
    {
        $conexion = new Conexion();
        $boletoDAO = new BoletoDAO();
        $boletoDAO->setPasajero($this->getPasajero());
        $conexion->abrir();
        $conexion->ejecutar($boletoDAO->consultarBoleto());
        $dato = $conexion->registro();
        $vuelo = new Vuelo();
        $vuelo->setHora($dato[3]);
        $vuelo->setFecha($dato[4]);
        $boleto = new Boleto(
            $dato[0],
            $dato[1],
            $dato[2],
            $this->getPasajero(),
            $vuelo,
            $dato[5]
        );
        
        $conexion->cerrar();
    }
}
/*
    select 
b.asiento,
b.idBoleto,
c.nombreClase,
v.hora,
v.fecha,
b.idBoleto,
b.precio
FROM
GrAlt_Boleto b
INNER JOIN GrAlt_ClaseBoleto c on b.idClase = c.idClase
INNER JOIN GrAlt_Vuelo v on b.idVuelo = v.idVuelo
WHERE
idPasajero = 1;
    */
