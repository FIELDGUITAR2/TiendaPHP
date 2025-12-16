<?php
require_once('logica/Persona.php');
require_once('persistencia/PilotoDAO.php');
require_once('persistencia/Conexion.php');
class Piloto extends Persona
{

        private $edad;
        private $fecha_nac;
        private $foto;
        private $idEstadoPersona;
        private $telefono;

        public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $edad = "", $fecha_nac = "", $foto = "", $idEstadoPersona = "", $telefono = "")
        {
                parent::__construct($id, $nombre, $apellido, $correo, $clave);
                $this->edad = $edad;
                $this->fecha_nac = $fecha_nac;
                $this->foto = $foto;
                $this->idEstadoPersona = $idEstadoPersona;
                $this->telefono = $telefono;
        }


        /**
         * Get the value of edad
         */
        public function getEdad()
        {
                return $this->edad;
        }

        /**
         * Get the value of fecha_nac
         */
        public function getFecha_nac()
        {
                return $this->fecha_nac;
        }

        /**
         * Get the value of foto
         */
        public function getFoto()
        {
                return $this->foto;
        }

        /**
         * Get the value of idEstadoPersona
         */
        public function getIdEstadoPersona()
        {
                return $this->idEstadoPersona;
        }

        /**
         * Get the value of telefono
         */
        public function getTelefono()
        {
                return $this->telefono;
        }

        public function autenticar()
        {
                $conexion = new Conexion();
                $pilotoDAO = new PilotoDAO();
                $conexion->abrir();
                $conexion->ejecutar($pilotoDAO->autenticar());
                if (($datos = $conexion->registro()) != null) {
                        $piloto = new Piloto($datos[0]);
                        $conexion->cerrar();
                        return true;
                }
                $conexion->cerrar();
                return false;
        }

        public function consultarPilotos()
        {
                $conexion = new Conexion();
                $pilotoDAO = new PilotoDAO();
                $conexion->abrir();
                $conexion->ejecutar($pilotoDAO->consultarPilotos());
                $lista = array();
                while (($dato = $conexion->registro()) != null) {
                        $piloto = new Piloto(
                                $dato[0],
                                $dato[1],
                                $dato[2],
                                $dato[3],
                                "",
                                "",
                                $dato[7],
                                $dato[4],
                                $dato[5],
                                $dato[6]
                        );
                        array_push($lista, $piloto);
                }
                $conexion->cerrar();
                return $lista;
        }

        public function actualizarPiloto()
        {


                $conexion = new Conexion();
                $pilotoDAO = new PilotoDAO(
                        $this->id,
                        $this->nombre,
                        $this->apellido,
                        $this->correo,
                        "",
                        "",
                        $this->fecha_nac,
                        $this->foto,
                        $this->idEstadoPersona,
                        $this->telefono
                );
                $conexion->abrir();
                $resultado = $conexion->ejecutarTF($pilotoDAO->actualizarPiloto());
                $conexion->cerrar();
                return $resultado ? true : false;
        }

        public function consultar()
        {
                $conexion = new Conexion();
                $conexion->abrir();
                $pilotoDAO = new PilotoDAO($this->getId());
                $conexion->ejecutar($pilotoDAO->consultar());
                while (($dato = $conexion->registro())) {

                        $this->nombre = $dato[0];
                        $this->apellido = $dato[1];
                        $this->correo = $dato[2];
                        $this->clave = $dato[3];
                        $this->edad = "";
                        $this->fecha_nac = $dato[7];
                        $this->foto = $dato[4];
                        $this->idEstadoPersona = $dato[5];
                        $this->telefono = $dato[6];
                }
        }

        public function agregar()
        {
                $conexion = new Conexion();
                $pilotoDAO = new PilotoDAO(
                        "",
                        $this->getNombre(),
                        $this->getApellido(),
                        $this->getCorreo(),
                        $this->getClave(),
                        "",
                        $this->getFecha_nac(),
                        "",
                        $this->getIdEstadoPersona(),
                        $this->getTelefono()
                );

                $conexion->abrir();
                
                $resultado = $conexion->ejecutarTF($pilotoDAO->agregar());

                $conexion->cerrar();

                return $resultado ? true : false;
        }
}
