<?php

class Conexion
{
    private $conexion;
    private $resultado;

    public function abrir()
    {
        $this->conexion = new mysqli("localhost", "root", "", "Tienda");
    }

    public function cerrar()
    {
        $this->conexion->close();
    }

    public function ejecutar($sql)
    {
        $this->resultado = $this->conexion->query($sql);

        if (!$this->resultado) {
            error_log("Error SQL: " . $this->conexion->error);
        }
    }


    public function registro()
    {
        if (!$this->resultado) {
            return null;
        }

        return $this->resultado->fetch_row();
    }


    public function filas()
    {
        if (!$this->resultado) {
            
            return 0;
        }

        if ($this->resultado instanceof mysqli_result) {
            return $this->resultado->num_rows;
        }

        
        return 0;
    }

    /**
     * Get the value of resultado
     */ 
    public function getResultado()
    {
        return $this->resultado;
    }
    
}
