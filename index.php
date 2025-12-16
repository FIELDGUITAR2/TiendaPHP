<?php 
session_start();

/*
require ("logica/Especialidad.php");
require ("logica/Medico.php");
require ("logica/Paciente.php");
require ("logica/Cita.php");
require ("logica/Consultorio.php");
require ("logica/Admin.php");
require ("logica/EstadoCita.php");
*/

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Altair Air</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<!-- jQuery (solo una vez) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<!-- Bootstrap JS + Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<style>
  #carruselPaisajes .carousel-item img {
    height: 420px;
    object-fit: cover;
  }
</style>

</head>

<?php 

$paginas_sin_autenticacion = array(
    "presentacion/inicio.php"    
    /*
    "presentacion/autenticar.php",
    ,
    */
);

$paginas_con_autenticacion = array(
    /*"presentacion/medico/editarFotoPerfil.php",*/
);


if(!isset($_GET["pid"])){
    include ("presentacion/inicio.php");
}else{

    $pid = base64_decode($_GET["pid"]);
    if(in_array($pid, $paginas_sin_autenticacion)){
        include $pid;
    }else if(in_array($pid, $paginas_con_autenticacion)){
        if(!isset($_SESSION["id"])){
            include "presentacion/autenticar.php";
        }else{
            include $pid;
        }
    }else{
        echo "error 404";
    }
}
?>

</html>

