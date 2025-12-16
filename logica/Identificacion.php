<?php
    class Identificacion
    {
        private $id;
        private $Nombre;

        public function __construct($id, $Nombre)
        {
            $this->id = $id;
            $this->Nombre = $Nombre;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getNombre()
        {
            return $this->Nombre;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setNombre($Nombre)
        {
            $this->Nombre = $Nombre;
        }

    }
?>