<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if ($_SESSION["rol"] != "pasajero") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}

$error = 0;
?>

<body>
    <?php
    include('presentacion/encabezado.php');
    include('presentacion/menuPasajero.php');
    ?>
    <div
        class="container mt-5">
        <div
            class="row justify-content-center align-items-center g-2">
            <div class="col">

                <div class="card text-start">
                    <div class="card-body">
                        <h4 class="card-title">Mis Boletos</h4>
                        <div
                            class="table-responsive">
                            <table
                                class="table table-success">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Asiento</th>
                                        <th scope="col">Clase</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">PDF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $boleto = new Boleto();
                                        $boleto->setPasajero($_SESSION['id']);
                                        $boletos = $boleto->consultarBoleto();
                                        foreach($boletos as $b)
                                        {
                                            echo "<tr>";
                                            echo "<td>".$b->getIdBoleto()."</td>";
                                            echo "<td>".$b->getAsiento()."</td>";
                                            echo "<td>".$b->getClase()."</td>";
                                            echo "<td>".$b->getVuelo()->getHora()."</td>";
                                            echo "<td>".$b->getVuelo()->getFecha()."</td>";
                                            echo "<td>".$b->getPrecio()."</td>";
                                            echo "<td>";
                                            ?>
                                            <form action="?pid=<?php echo base64_encode('presentacion/boletos/reporteBoleto.php')?>" method="POST" target="_blank">

                                                <input type="hidden" name="id" value="<?php echo $b->getIdBoleto(); ?>">
                                                <input type="hidden" name="asiento" value="<?php echo $b->getAsiento(); ?>">
                                                <input type="hidden" name="clase" value="<?php echo $b->getClase(); ?>">
                                                <input type="hidden" name="hora" value="<?php echo $b->getVuelo()->getHora(); ?>">
                                                <input type="hidden" name="fecha" value="<?php echo $b->getVuelo()->getFecha(); ?>">
                                                <input type="hidden" name="precio" value="<?php echo $b->getPrecio(); ?>">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-file-pdf"></i> PDF
                                                </button>
                                            </form>

                                            <?php
                                            echo "</td>";
                                            echo "</tr>";
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

</body>