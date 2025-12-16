<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow border-0">
                <div class="card-header text-white"
                    style="background: linear-gradient(90deg, #0b6623, #c9b200);">
                    <h4 class="mb-0">
                        <i class="fa-solid fa-plane-departure"></i> Próximos Vuelos
                    </h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Id Vuelo</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $vuelo = new Vuelo();
                                $vuelos = $vuelo->consultarVuelosProximos();

                                if (count($vuelos) > 0) {
                                    foreach ($vuelos as $v) {
                                        echo "<tr>";
                                        echo "<td>" . $v->getIdVuelo() . "</td>";
                                        echo "<td>" . $v->getOrigen() . "</td>";
                                        echo "<td>" . $v->getDestino() . "</td>";
                                        echo "<td>" . $v->getFecha() . "</td>";
                                        echo "<td>" . $v->getHora() . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center text-muted'>
                                                No hay vuelos próximos.
                                              </td></tr>";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>