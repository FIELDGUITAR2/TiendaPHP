<?php
if ($_SESSION["rol"] != "pasajero") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}
?>

<body>
    <?php
    include("presentacion/encabezado.php");
    include("presentacion/menuPasajero.php");
    
    ?>

    <div class="container my-4">
        <div class="row justify-content-between align-items-center">
            
            <!-- Texto principal -->
            <div class="col-md-8">
                <h1 class="fw-bold mb-0">Bienvenido Pasajero</h1>
                <p class="text-muted">Revise su información, vuelos disponibles y su historial de viajes.</p>
            </div>

            <!-- Imagen decorativa -->
            <div class="col-md-4 text-end">
                <img src="img/pasajero.png" 
                     alt="Imagen pasajero" 
                     class="img-fluid" 
                     style="max-width: 150px;">
            </div>

        </div>

        <hr>
    </div>

    <?php
        include('presentacion/vuelo/proximosVuelos.php');
    ?>

</body>
