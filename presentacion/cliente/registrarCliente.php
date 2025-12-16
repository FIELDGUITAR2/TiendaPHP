<?php

if (isset($_GET["sesion"]) && $_GET["sesion"] == "false") {
    session_destroy();
}

$error = "";
$exito = "";

if (isset($_POST["registrar"])) {

    // Recibir datos
    $nombres   = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $correo    = $_POST["correo"];
    $clave     = $_POST["clave"];
    $clave2    = $_POST["clave2"];
    $telefono  = $_POST["telefono"];

    // Validación básica
    if ($clave !== $clave2) {
        $error = "❌ Las claves no coinciden.";
    } else {
        $pasajero = new Pasajero(
            "",
            $nombres,
            $apellidos,
            $correo,
            $clave,
            "",
            "",
            $telefono
        );
        $res = $pasajero->registrar();
        if ($res) {
            echo "se registro";
        } else {
            echo "error al registrar";
        }

        $exito = "✔ Usuario registrado correctamente.";
    }
}
?>

<body>
    <div class="container my-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5">

                <div class="card p-4">

                    <h4 class="text-center mb-3">Registro de Usuario</h4>

                    <!-- Mostrar mensajes -->
                    <?php if ($error) { ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php } ?>

                    <?php if ($exito) { ?>
                        <div class="alert alert-success"><?= $exito ?></div>
                    <?php } ?>

                    <form action="" method="post">

                        <label class="mt-2">Nombres</label>
                        <input class="form-control" type="text" name="nombres" required>

                        <label class="mt-3">Apellidos</label>
                        <input class="form-control" type="text" name="apellidos" required>

                        <label class="mt-3">Correo</label>
                        <input class="form-control" type="email" name="correo" required>

                        <label class="mt-3">Clave</label>
                        <input class="form-control" type="password" name="clave" required>

                        <label class="mt-3">Confirmar clave</label>
                        <input class="form-control" type="password" name="clave2" required>

                        <label class="mt-3">Teléfono</label>
                        <input class="form-control" type="text" name="telefono" required>

                        <button class="btn btn-success w-100 mt-4" type="submit" name="registrar">
                            Crear cuenta
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </div>

</body>