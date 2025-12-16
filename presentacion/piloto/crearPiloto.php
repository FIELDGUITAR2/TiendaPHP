<?php
if ($_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}

$error = 0;
$mensaje = "";

// ---- CUANDO PRESIONA AGREGAR ----
if(isset($_POST['agregar']))
{
    // Recibir datos del formulario
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $fecha_nac = $_POST['fecha_nac'];
    $estado = $_POST['idEstadoPersona'];

    // Crear objeto Piloto (ajusta el constructor según tu modelo)
    $piloto = new Piloto(
        "",          // id vacío para insertar
        $nombres,
        $apellidos,
        $correo,
        $clave,       
        "",          // Foto (vacío)
        $fecha_nac,
        "",
        $estado,
        $telefono            // idRolPersona u otro campo necesario según tu BD
    );

    $resultado = $piloto->agregar();

    if($resultado){
        $mensaje = "<div class='alert alert-success text-center mt-3'>Piloto agregado correctamente</div>";
    } else {
        $mensaje = "<div class='alert alert-danger text-center mt-3'>Error al agregar el piloto</div>";
    }
}
?>

<body>

<?php
include("presentacion/encabezado.php");
include("presentacion/menuAdmin.php");
?>

<div class="container mt-4">
    <?php echo $mensaje; ?>

    <div class="row justify-content-center g-4">

        <!-- Card Izquierda -->
        <div class="col-12 col-md-7">
            <div class="card shadow-lg border-0 rounded-4 card-hover">

                <div class="text-center pt-4">
                    <img src="img/AltairAir.png" class="img-fluid" style="max-width: 180px;">
                </div>

                <div class="card-body text-center">
                    <h4 class="card-title fw-bold mb-3">Agregar pilotos nuevos</h4>
                    <p class="card-text text-muted">
                        Pon los datos del piloto y dale en agregar.
                    </p>

                    <form action="?pid=<?php echo base64_encode('presentacion/piloto/crearPiloto.php')?>" method="post">

                        <div class="mb-3">
                            <label class="form-label">Nombres</label>
                            <input type="text" name="nombres" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" name="correo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Clave</label>
                            <input type="password" name="clave" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha de nacimiento</label>
                            <input type="date" name="fecha_nac" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estado del piloto</label>
                            <select name="idEstadoPersona" class="form-select" required>
                                <option value="">Seleccione...</option>
                                <?php
                                    $estado = new EstadoPersona();
                                    $estados = $estado->consultar();
                                    foreach($estados as $e)
                                    {
                                        echo "<option value='".$e->getIdEstadoPersona()."'>".$e->getNombreEstado()."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2" name="agregar">
                            Guardar Piloto
                        </button>

                    </form>
                </div>
            </div>
        </div>

        <!-- Card Derecha -->
        <div class="col-12 col-md-5">
            <div class="card shadow-lg border-0 rounded-4 card-hover">

                <div class="text-center pt-4">
                    <img src="img/AltairAir.png" class="img-fluid" style="max-width: 150px;">
                </div>

                <div class="card-body text-center">
                    <h4 class="card-title fw-bold mb-3">Agregar Foto Piloto</h4>
                    <p class="card-text text-muted">
                        Sección para agregar la foto del piloto nuevo.
                    </p>

                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" class="form-control">
                    </form>

                </div>

            </div>
        </div>

    </div>
</div>
