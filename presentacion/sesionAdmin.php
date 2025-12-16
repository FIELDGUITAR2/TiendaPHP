<?php
if ($_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}
?>

<body>
    <?php
    include("presentacion/encabezado.php");
    include("presentacion/menuAdmin.php");
    ?>

    <div class="container m-4">
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <h1 class="fw-bold mb-0">Estadísticas del Administrador</h1>
            <p class="text-muted">Panel de control general</p>

            <div class="d-flex justify-content-center">
                <?php include('presentacion/vuelo/graficasVuelos.php'); ?>
            </div>
        </div>
    </div>
</div>

</div>



</body>