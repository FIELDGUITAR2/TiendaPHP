<?php
    class TipoIdDAO
    {
        private $IdTipo;
        private $NombreTipo;

        public function __construct($IdTipo="",$NombreTipo="")
        {
            $this->IdTipo = $IdTipo;
            $this->NombreTipo = $NombreTipo;
        }

        public function MostrarTipo()
        {
            return"select ID_Id, Val_TipoId from TipoId";
        }
    }
?>