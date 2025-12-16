<?php
    require_once('persistencia/Conexion.php');
    require_once('persistencia/EstadoVueloDAO.php');
    class EstadoVuelo
    {
        private $idEstado;
        private $nombre;

        public function __construct($idEstado = "", $nombre = "")
        {
            $this->idEstado = $idEstado;
            $this->nombre = $nombre;

        }
        

        /**
         * Get the value of idEstado
         */ 
        public function getIdEstado()
        {
                return $this->idEstado;
        }

        /**
         * Set the value of idEstado
         *
         * @return  self
         */ 
        public function setIdEstado($idEstado)
        {
                $this->idEstado = $idEstado;

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
            return $this;
        }

        public function consultarEstadosVuelo()
        {
            $conexion = new Conexion();
            $evDAO = new EstadoVueloDAO();
            $conexion->abrir();
            $listEv = array();
            $conexion->ejecutar($evDAO->consultarEstadosVuelo());
            while(($dato = $conexion->registro()) != null)
            {
                $ev = new EstadoVuelo(
                    $dato[0],
                    $dato[1]
                );
                array_push($listEv,$ev);
            }
            $conexion->cerrar();
            return $listEv;
        }
    }
?>