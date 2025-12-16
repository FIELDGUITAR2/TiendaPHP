<?php
    require_once("persistencia/Conexion.php");
    require_once("persistencia/PersonaDAO.php");
    class Persona 
    {
        protected $id;
        protected $nombre;
        protected $idId;
        protected $correo;
        protected $telefono;
        protected $direccion;

        public function __construct($id = null, $nombre = null, $idId = null, $correo = null, $telefono = null, $direccion = null)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->idId = $idId;
            $this->correo = $correo;
            $this->telefono = $telefono;
            $this->direccion = $direccion;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getIdId()
        {
            return $this->idId;
        }

        public function getCorreo()
        {
            return $this->correo;
        }

        public function getTelefono()
        {
            return $this->telefono;
        }

        public function getDireccion()
        {
            return $this->direccion;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function setIdId($idId)
        {
            $this->idId = $idId;
        }

        public function setCorreo($correo)
        {
            $this->correo = $correo;
        }

        public function setTelefono($telefono)
        {
            $this->telefono = $telefono;
        }

        public function setDireccion($direccion)
        {
            $this->direccion = $direccion;
        }

        public function InsertarPersona()
        {
            $conexion = new Conexion();
            $personaDAO = new PersonaDAO($this->getId(),$this->getNombre(), $this->getIdId(), $this->getCorreo(), $this->getTelefono(), $this->getDireccion());
            $conexion->ejecutar($personaDAO->InsertarPersona());
            $conexion->cerrar();
        }
        
    }
?>