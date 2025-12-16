<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if ($_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}

if (isset($_POST["actualizarVuelo"])) {

    $vuelo = new Vuelo(
        $_POST["idVuelo"],
        $_POST["avion"],
        $_POST["piloto"],
        $_POST["copiloto"],
        "",   // origen (si no lo actualizas, pon "")
        "",   // destino
        $_POST["estado"],
        $_POST["hora"],
        $_POST["fecha"],
        ""    // pasajeros
    );

    $res = $vuelo->actualizarVuelo();

    echo $res ? "Vuelo actualizado correctamente" : "Error al actualizar";
}

?>

<body>
    <?php
    include('presentacion/encabezado.php');
    include('presentacion/menuAdmin.php');
    ?>

    <div class="container-fluid mt-4">

        <div class="row justify-content-center g-4">

            <!-- SECCIÓN DE VUELOS -->
            <div class="col-lg-11 col-md-12">
                <div class="card shadow">

                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Vuelos</h4>
                    </div>

                    <div class="card-body">
                        <p class="text-muted">Próximos vuelos programados:</p>

                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>Id vuelo</th>
                                        <th>Avion</th>
                                        <th>Piloto</th>
                                        <th>Copiloto</th>
                                        <th>Origen</th>
                                        <th>Destino</th>
                                        <th>Estado</th>
                                        <th>Hora</th>
                                        <th>Fecha</th>
                                        <th>Pasajeros</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $vuelo = new Vuelo();
                                    $vuelos = $vuelo->consultarVuelos();

                                    foreach ($vuelos as $v) {
                                    ?>

                                        <tr>
                                            <td><?= $v->getIdVuelo(); ?></td>
                                            <td><?= $v->getAvion(); ?></td>
                                            <td><?= $v->getPiloto(); ?></td>
                                            <td><?= $v->getCopiloto(); ?></td>
                                            <td><?= $v->getOrigen(); ?></td>
                                            <td><?= $v->getDestino(); ?></td>
                                            <td><?= $v->getEstado(); ?></td>
                                            <td><?= $v->getHora(); ?></td>
                                            <td><?= $v->getFecha(); ?></td>
                                            <td><?= $v->getCantidadPasajeros(); ?></td>

                                            <td class="text-center">
                                                <button
                                                    class="btn btn-warning btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalEditar<?= $v->getIdVuelo(); ?>">
                                                    Editar
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- MODAL -->
                                        <div class="modal fade" id="modalEditar<?= $v->getIdVuelo(); ?>" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header bg-warning">
                                                        <h5 class="modal-title">Editar vuelo #<?= $v->getIdVuelo(); ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <form method="POST" action="?pid=<?= base64_encode('presentacion/vuelo/consultarVuelo.php'); ?>">
                                                        <div class="modal-body">

                                                            <input type="hidden" name="idVuelo" value="<?= $v->getIdVuelo(); ?>">

                                                            <div class="row g-3">

                                                                <div class="col-md-6">
                                                                    <label>Avion</label>
                                                                    <select class="form-control" name="avion" id="avion">
                                                                        <option value="">Seleccione una opcion</option>
                                                                        <?php
                                                                            $avionF = new Avion();
                                                                            $avionesF = $avionF->consultarAviones();
                                                                            foreach($avionesF as $p)
                                                                            {
                                                                                echo "<option value='".$p->getId()."'>".$p->getNombreAvion()."</option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label>Piloto</label>
                                                                    <select class="form-control" name="piloto" id="piloto">
                                                                        <option value="">Seleccione una opcion</option>
                                                                        <?php
                                                                            $pilotoS = new Piloto();
                                                                            $pilotosS = $pilotoS->consultarPilotos();
                                                                            foreach($pilotosS as $p)
                                                                            {
                                                                                echo "<option value='".$p->getId()."'>".$p->getNombre()."</option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label>Copiloto</label>
                                                                    <select class="form-control" name="copiloto" id="copiloto">
                                                                        <option value="">Seleccione una opcion</option>
                                                                        <?php
                                                                            foreach($pilotosS as $cp)
                                                                            {
                                                                                echo "<option value='".$cp->getId()."'>".$cp->getNombre()."</option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Estado</label>
                                                                    <select class="form-control" name="estado">
                                                                        <?php
                                                                        $estadoVueloF = new EstadoVuelo();
                                                                        $estadosVueloF = $estadoVueloF->consultarEstadosVuelo();
                                                                        foreach ($estadosVueloF as $ev) {
                                                                            echo "<option value='" . $ev->getIdEstado() . "'>" . $ev->getNombre() . "</option>";
                                                                        }
                                                                        ?>

                                                                    </select>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label>Hora</label>
                                                                    <input type="time" class="form-control" name="hora" value="<?= $v->getHora(); ?>">
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label>Fecha</label>
                                                                    <input type="date" class="form-control" name="fecha" value="<?= $v->getFecha(); ?>">
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <button type="submit" name="actualizarVuelo" class="btn btn-success">Guardar cambios</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</body>