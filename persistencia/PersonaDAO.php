<?php
    class PersonaDAO
    {
        private $id;
        private $nombre;
        private $idId;
        private $correo;
        private $telefono;
        private $direccion;

        public function __construct($id = null, $nombre = null, $idId = null, $correo = null, $telefono = null, $direccion = null)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->idId = $idId;
            $this->correo = $correo;
            $this->telefono = $telefono;
            $this->direccion = $direccion;
        }

        public function Autenticar()
        {
            return"";
        }
    }
?>