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
        return "";
    }
    public function InsertarPersona()
    {
        return "insert into Persona(ID_Persona,Correo,ID_Id,Direccion,Nombre,Telefono)"
        ."VALUES"
        ."(".$this->id.",'".$this->correo."',".$this->idId.",'".$this->direccion."','".$this->nombre."','".$this->telefono."');";
    }
}
?>