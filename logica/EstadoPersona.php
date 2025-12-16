<?php

require_once ('persistencia/Conexion.php');
require_once ('persistencia/EstadoPersonaDAO.php');
    class EstadoPersona{
        private $idEstadoPersona;
        private $NombreEstado;

        public function __construct($idEstadoPersona = "", $NombreEstado = "")
        {
            $this->idEstadoPersona = $idEstadoPersona;
            $this->NombreEstado = $NombreEstado;
        }

        /**
         * Get the value of idEstadoPersona
         */ 
        public function getIdEstadoPersona()
        {
                return $this->idEstadoPersona;
        }

        /**
         * Get the value of NombreEstado
         */ 
        public function getNombreEstado()
        {
                return $this->NombreEstado;
        }

        public function consultar()
        {
            $conexion = new Conexion();
            $estadoPersonaDAO = new EstadoPersonaDAO();
            $conexion->abrir();
            $conexion -> ejecutar($estadoPersonaDAO -> consultar());
            $estadosPersonas = array();
            while(($dato = $conexion -> registro()) != null){
                $estadoPersona = new EstadoPersona($dato[0], $dato[1]);
                array_push($estadosPersonas, $estadoPersona);
            }
            $conexion -> cerrar();
            return $estadosPersonas;
        }
    }
?>