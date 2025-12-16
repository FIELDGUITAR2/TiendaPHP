<?php
$id = $_SESSION["id"];
$pasajero = new Pasajero($id);
$pasajero->autenticar();
$p = $pasajero->consultar();
?>

<div class="container-fluid px-0">
    <nav class="navbar navbar-expand-lg navbar-dark"
        style="background: linear-gradient(90deg, #0b6623, #c9b200);">

        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center"
                href="?pid=<?php echo base64_encode('presentacion/sesionPasajero.php') ?>">

                <img src="img/AltairAir.png" alt="Logo" style="height:40px;" class="me-2">

                <strong>Altair Air - Pasajero</strong>
            </a>

            <!-- Botón mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarPasajero" aria-controls="navbarPasajero"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido Menú -->
            <div class="collapse navbar-collapse" id="navbarPasajero">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <!-- Inicio -->
                    <li class="nav-item">
                        <a class="nav-link active"
                            href="?pid=<?php echo base64_encode('presentacion/sesionPasajero.php') ?>">

                            <i class="fa-solid fa-house"></i> Inicio
                        </a>
                    </li>

                    <!-- Vuelos Disponibles -->
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" 
                           href="?pid=<?php echo base64_encode('presentacion/sesionPasajero.php') ?>">

                            <i class="fa-solid fa-plane-departure"></i> Vuelos Disponibles
                        </a>
                    </li>
-->
                    <!-- Mis Boletos -->
                    <li class="nav-item">
                        <a class="nav-link"
                            href="?pid=<?php echo base64_encode('presentacion/boletos/misBoletos.php') ?>">

                            <i class="fa-solid fa-ticket"></i> Mis Boletos
                        </a>
                    </li>

                    <!-- Mi Historial -->
                    <li class="nav-item">
                        <a class="nav-link"
                            href="?pid=<?php echo base64_encode('presentacion/pasajero/historialVuelos.php') ?>">

                            <i class="fa-solid fa-clock-rotate-left"></i> Historial de Viajes
                        </a>
                    </li>

                </ul>

                <!-- Perfil Pasajero -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#"
                            data-bs-toggle="dropdown">

                            <i class="fa-solid fa-user"></i>
                            <?php
                            foreach ($p as $perfil) {
                                echo $perfil->getNombre() . " (" . $perfil->getCorreo() . ")";
                            }
                            ?>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item"
                                    href="?pid=<?php echo base64_encode('presentacion/cliente/actualizarCliente.php') ?>">
                                    Editar Perfil</a></li>

                            <li>
                                <a class="dropdown-item text-danger" href="?pid=<?php echo base64_encode('presentacion/cerrar.php')?> ">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> Salir
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</div>