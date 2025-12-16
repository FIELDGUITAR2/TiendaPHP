<!doctype html>
<html lang="en">

<head>
    <title>Chazammm</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <?php
    $rol = isset($_SESSION["rol"]) ? $_SESSION["rol"] : "";
    if ($rol == "admin") {
        ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Chazammm</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="?pid=<?php echo base64_encode("presentacion/MenuAdmin.php");?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pid=<?php echo base64_encode("presentacion/Admin/AgregarEditarEmpleado.php");?>">Agregar editar empleado</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pid=<?php echo base64_encode(""); ?>">Agregar editar producto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pid=<?php echo base64_encode(""); ?>">Nomina</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="index.php?sesion=false">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
    } elseif ($rol == "empleado") {
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Chazammm</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="?pid=<?php echo base64_encode("presentacion/Inicio.php"); ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pid=<?php echo base64_encode(""); ?>">#</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?pid=<?php echo base64_encode(""); ?>">#</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
    }
    ?>