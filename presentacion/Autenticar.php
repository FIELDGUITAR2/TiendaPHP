<?php

include_once("presentacion/extremos/cabeza.php");
require_once("persistencia/Conexion.php");
require_once("logica/Admin.php");
require_once("logica/Empleado.php");


$id = isset($_POST["inputName"]) ? $_POST["inputName"] : "";
$pass = isset($_POST["inputPass"]) ? $_POST["inputPass"] : "";

if (isset($_POST["botonEnviar"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $admin = new Admin();
        $admin->setIdAdmin($id);
        $admin->setClave($pass);

        echo $admin->getIdAdmin();
        echo $admin->getClave();

        $empleado = new Empleado();
        $empleado->setIdEmpleado($id);
        $empleado->setClave($pass);

        echo $empleado->getIdEmpleado();
        echo $empleado->getClave();

        if ($admin->autenticar()) {
            $_SESSION["id"] = $id;
            $_SESSION["nombre"] = $admin->getNombre();
            $_SESSION["rol"] = "admin";
            header("Location: ?pid=" . base64_encode("presentacion/MenuAdmin.php"));
        }elseif ($empleado->autenticar()) {
            $_SESSION["id"] = $id;
            $_SESSION["nombre"] = $empleado->getNombre();
            $_SESSION["rol"] = "empleado";
            header("Location: ?pid=" . base64_encode("presentacion/MenuEmpleado.php"));
        } else {
            echo "<div class='alert alert-danger'>Error de autenticación</div>";
        }
    }
}

?>

<div class="container">
    <form action="#" method="post">
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">ID</label>
            <div class="col-8">
                <input type="text" class="form-control" name="inputName" id="inputName" placeholder="ID" required />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPass" class="col-4 col-form-label">Password</label>
            <div class="col-8">
                <input type="password" class="form-control" name="inputPass" id="inputPass" placeholder="*******"
                    required />
            </div>
        </div>
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <button type="submit" name="botonEnviar" class="btn btn-primary">Enviar</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </div>
    </form>
</div>

<?php
include_once("presentacion/extremos/pie.php");
?>