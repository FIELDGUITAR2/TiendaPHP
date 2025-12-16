<?php
require_once("persistencia/TipoIdDAO.php");
require_once("persistencia/Conexion.php");
class TipoId
{
    private $IdTipo;
    private $NombreTipo;

    public function __construct($IdTipo = "", $NombreTipo = "")
    {
        $this->IdTipo = $IdTipo;
        $this->NombreTipo = $NombreTipo;
    }

    public function MostrarTiposId()
    {
        $conexion = new Conexion();
        $tipoIdDAO = new TipoIdDAO();
        $conexion->abrir(); // <-- ESTA LÍNEA FALTABA
        $conexion->ejecutar($tipoIdDAO->MostrarTipo());
        $tipos = [];
        while (($datos = $conexion->registro()) != null) {
            $tipo = new TipoId($datos[0], $datos[1]);
            array_push($tipos, $tipo);
        }
        $conexion->cerrar();
        return $tipos;
    }

    /**
     * Get the value of NombreTipo
     */
    public function getNombreTipo()
    {
        return $this->NombreTipo;
    }

    /**
     * Set the value of NombreTipo
     *
     * @return  self
     */
    public function setNombreTipo($NombreTipo)
    {
        $this->NombreTipo = $NombreTipo;

        return $this;
    }

    /**
     * Set the value of IdTipo
     *
     * @return  self
     */
    public function setIdTipo($IdTipo)
    {
        $this->IdTipo = $IdTipo;

        return $this;
    }

    /**
     * Get the value of IdTipo
     */
    public function getIdTipo()
    {
        return $this->IdTipo;
    }
}
?>