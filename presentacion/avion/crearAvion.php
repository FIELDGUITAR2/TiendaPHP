<?php
if ($_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}

$error = 0;
?>

<body>
    <?php
    include('presentacion/encabezado.php');
    include('presentacion/menuAdmin.php');
    ?>
    <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Insertar Nuevo Avión</h4>
                </div>

                <div class="card-body">
                    <form action="?pid=<?php echo base64_encode('presentacion/avion/crearAvion.php'); ?>" method="post">

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del avión</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ej: Boeing 737" required>
                        </div>

                        <div class="mb-3">
                            <label for="cmPasajeros" class="form-label">Capacidad de pasajeros</label>
                            <input type="number" class="form-control" name="cmPasajeros" id="cmPasajeros" placeholder="Ej: 180" required>
                        </div>

                        <div class="mb-3">
                            <label for="cmCombustible" class="form-label">Capacidad de combustible (L)</label>
                            <input type="number" class="form-control" name="cmCombustible" id="cmCombustible" placeholder="Ej: 26000" required>
                        </div>

                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo de avión</label>
                            <select class="form-select" name="tipo" id="tipo" required>
                                <option value="">Seleccione un tipo...</option>
                                <?php
                                    $tAvion = new TipoAvion();
                                    $tsAvion = $tAvion->consultarTipos();
                                    foreach($tsAvion as $t)
                                    {
                                        echo "<option value='".$t->getIdTipo()."'>".$t->getNombre()."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Guardar Avión</button>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Aquí puedes agregar otra tarjeta, información o imagen -->
        </div>
    </div>
</div>


</body>