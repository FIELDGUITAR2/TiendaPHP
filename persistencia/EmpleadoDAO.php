<?php
    class EmpleadoDAO
    {
        private $id;
        private $nombre;
        private $idId;
        private $correo;
        private $telefono;
        private $direccion;
        private $idEmpleado;
        private $clave;

        public function __construct($id = "", $nombre = "", $idId = "", $correo = "", $telefono = "", $direccion = "", $idEmpleado = "", $clave = "")
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->idId = $idId;
            $this->correo = $correo;
            $this->telefono = $telefono;
            $this->direccion = $direccion;
            $this->idEmpleado = $idEmpleado;
            $this->clave = $clave;
        }
        
        public function Autenticar()
        {
            return "select ID_Empleado from Empleado where ID_Empleado = ".$this->idEmpleado." and Clave_Empleado = md5('".$this->clave."');";
        }

        public function MostrarEmpleados()
        {
            return "select 
            p.ID_Persona, 
            em.ID_Empleado, 
            p.Nombre, 
            p.Correo, 
            p.Telefono, 
            p.Direccion 
            from 
            Empleado em 
            INNER JOIN Persona p on em.ID_Persona = p.ID_Persona;";
        }
    }
?>