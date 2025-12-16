<?php
$id = $_SESSION["id"];
$admin = new Admin($id);
$admin->consultar();
?>
<div class="container-fluid px-0">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(90deg, #0b6623, #c9b200);">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center"
                href="?pid=<?php echo base64_encode('presentacion/sesionAdmin.php') ?>">
                <img src="img/AltairAir.png" alt="Logo" style="height:40px;" class="me-2">
                <strong>Altair Air - Admin</strong>
            </a>

            <!-- Botón mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarAdmin" aria-controls="navbarAdmin"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido del menú -->
            <div class="collapse navbar-collapse" id="navbarAdmin">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" href="?pid=<?php echo base64_encode('presentacion/sesionAdmin.php') ?>">
                            <i class="fa-solid fa-house"></i> Inicio
                        </a>
                    </li>

                    <!-- Gestión de pilotos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-user-tie"></i> Pilotos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?pid=<?php echo base64_encode('presentacion/piloto/consultarPiloto.php') ?>">Consultar</a></li>
                            <li><a class="dropdown-item" href="?pid=<?php echo base64_encode('presentacion/piloto/crearPiloto.php') ?>">Registrar</a></li>
                        </ul>
                    </li>

                    <!-- Gestión de vuelos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-plane"></i> Vuelos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?pid=<?php echo base64_encode('presentacion/vuelo/consultarVuelo.php') ?>">Consultar</a></li>
                            <li><a class="dropdown-item" href="?pid=<?php echo base64_encode('presentacion/vuelo/crearVuelo.php') ?>">Programar Vuelo</a></li>
                        </ul>
                    </li>

                    <!-- Gestión de aviones -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-jet-fighter"></i> Aviones
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?pid=<?php echo base64_encode('presentacion/avion/consultarAvion.php') ?>">Consultar</a></li>
                            <li><a class="dropdown-item" href="?pid=<?php echo base64_encode('presentacion/avion/crearAvion.php') ?>">Registrar</a></li>
                        </ul>
                    </li>

                    <!-- Gestión boletos -->
                    <!--
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ticket"></i> Boletos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?pid=<?php echo base64_encode('presentacion/boleto/consultarBoleto.php') ?>">Consultar</a></li>
                            <li><a class="dropdown-item" href="?pid=<?php echo base64_encode('presentacion/boleto/crearBoleto.php') ?>">Generar Boleto</a></li>
                        </ul>
                    </li> -->
                </ul>

                <!-- Perfil Admin -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-user-shield"></i>
                            Administrador:
                            <?php echo $admin->getNombre() . " " . $admin->getCorreo(); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Editar Perfil</a></li>
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