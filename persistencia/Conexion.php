<?php

class Conexion
{
    private $conexion;
    private $resultado;

    public function abrir()
    {
        if ($_SERVER['REMOTE_ADDR'] == "::1") {
            // Conexión local desde XAMPP (puerto 3310)
            // $this->conexion = new mysqli("127.0.0.1", "root", "", "copatoon");
            $this->conexion = new mysqli("localhost", "root", "", "chazamm", 3306);
        } else {
            // Conexión en servidor remoto
            $this->conexion = new mysqli("sql308.infinityfree.co", "if0_40691343", "SNKoTqCDlq", "f0_40691343_chazamm");
        }
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
