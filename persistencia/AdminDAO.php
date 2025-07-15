<?php
    class AdminDAO
    {
        private $nombre;
        private $idId;
        private $correo;
        private $telefono;
        private $direccion;
        private $idAdmin;
        private $clave;
        private $idPersona;

        public function __construct($nombre = "",$idId,$correo = "",$telefono = "",$direccion = "",$idAdmin = "",$clave = "",$idPersona = "")
        {
            $this->nombre = $nombre;
            $this->idId = $idId;
            $this->correo = $correo;
            $this->telefono = $telefono;
            $this->direccion = $direccion;
            $this->idAdmin = $idAdmin;
            $this->clave = $clave;
            $this->idPersona = $idPersona;
        }
        
        public function Autenticar()
        {
            return "select ID_Admin from Admin WHERE ID_Admin =".$this->idAdmin." and Clave_Admin = md5('".$this->clave."');";
        }
    }
?>