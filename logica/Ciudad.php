<?php
    class Ciudad {
        private $id;
        private $nombre;
        private $pais;

        public function __construct($id = "", $nombre = "", $pais = "") {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->pais = $pais;
        }

        public function getId() {
            return $this->id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getPais() {
            return $this->pais;
        }
    }
?>