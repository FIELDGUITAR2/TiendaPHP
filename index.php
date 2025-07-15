<?php
session_start();

/*
require_once("logica/Conexion.php");
*/
$paginas_sin_autenticacion = [
    "presentacion/Inicio.php",
    "presentacion/Autenticar.php"
];

$paginas_con_autenticacion = [
    "presentacion/MenuEmpleado.php",
    "presentacion/MenuAdmin.php"
];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chazammm</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://use.fontawesome.com/releases/v6.7.2/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>
    <?php
    if (!isset($_GET["pid"])) {
        include("presentacion/Inicio.php");
    } else {
        $pid = base64_decode($_GET["pid"]);
        if (in_array($pid, $paginas_sin_autenticacion)) {
            include $pid;
        } elseif (in_array($pid, $paginas_con_autenticacion)) {
            if (!isset($_SESSION["id"])) {
                include "presentacion/Autenticar.php";
            } else {
                include $pid;
            }
        } else {
            echo "Error 404";
        }
    }
    ?>
</body>

</html>