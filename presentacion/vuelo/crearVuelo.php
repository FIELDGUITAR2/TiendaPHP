<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if ($_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
    exit;
}

if (isset($_POST["insertarVuelo"])) {

    $avionId     = $_POST["avion"];
    $origenId    = $_POST["origen"];
    $destinoId   = $_POST["destino"];
    $pilotoId    = $_POST["piloto"];    
    $copilotoId  = $_POST["copiloto"];
    $fecha       = $_POST["fecha"];
    $hora        = $_POST["hora"];

    // OBJETO VUELO
    $vuelo = new Vuelo(
        "",
        $avionId,
        $pilotoId,
        $copilotoId,
        $origenId,
        $destinoId,
        1,       // Estado del vuelo
        $hora,
        $fecha,
        300      // Precio por defecto
    );

    $res = $vuelo->insertarVuelo();

    if ($res) {
        echo "<div class='alert alert-success text-center'>Vuelo insertado correctamente</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Error al insertar vuelo</div>";
    }
}
?>

<body>
<?php
include('presentacion/encabezado.php');
include('presentacion/menuAdmin.php');
?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Programar Nuevo Vuelo</h4>
                </div>

                <div class="card-body">

                    <form action="?pid=<?php echo base64_encode('presentacion/vuelo/crearVuelo.php') ?>" method="post">

                        <!-- Avión -->
                        <div class="mb-3">
                            <label class="form-label">Avión</label>
                            <select class="form-select" name="avion" required>
                                <option value="">Seleccione un avión</option>
                                <?php
                                $avion = new Avion();
                                $aviones = $avion->consultarAviones();
                                foreach ($aviones as $a) {
                                    echo "<option value='".$a->getId()."'>".$a->getNombreAvion()."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Origen -->
                        <div class="mb-3">
                            <label class="form-label">Origen</label>
                            <select class="form-select" name="origen" required>
                                <option value="">Seleccione un origen</option>
                                <?php
                                $aeropuerto = new Aeropuerto();
                                $aeropuertos = $aeropuerto->consultarListaAeropuertos();
                                foreach ($aeropuertos as $a) {
                                    echo "<option value='".$a->getId()."'>".$a->getNombre()." - ".$a->getCiudad()->getNombre()." (".$a->getCiudad()->getPais().")</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Destino -->
                        <div class="mb-3">
                            <label class="form-label">Destino</label>
                            <select class="form-select" name="destino" required>
                                <option value="">Seleccione un destino</option>
                                <?php
                                foreach ($aeropuertos as $a) {
                                    echo "<option value='".$a->getId()."'>".$a->getNombre()." - ".$a->getCiudad()->getNombre()." (".$a->getCiudad()->getPais().")</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Piloto -->
                        <div class="mb-3">
                            <label class="form-label">Piloto</label>
                            <select class="form-select" name="piloto" required>
                                <option value="">Seleccione un piloto</option>
                                <?php
                                $piloto = new Piloto();
                                $pilotos = $piloto->consultarPilotos();
                                foreach ($pilotos as $p) {
                                    echo "<option value='".$p->getId()."'>".$p->getNombre()."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Copiloto -->
                        <div class="mb-3">
                            <label class="form-label">Copiloto</label>
                            <select class="form-select" name="copiloto" required>
                                <option value="">Seleccione un copiloto</option>
                                <?php
                                foreach ($pilotos as $p) {
                                    echo "<option value='".$p->getId()."'>".$p->getNombre()."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Fecha -->
                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" required>
                        </div>

                        <!-- Hora -->
                        <div class="mb-3">
                            <label class="form-label">Hora</label>
                            <input type="time" class="form-control" name="hora" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100" name="insertarVuelo">
                            <i class="fa-solid fa-plus-circle"></i> Programar Vuelo
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
