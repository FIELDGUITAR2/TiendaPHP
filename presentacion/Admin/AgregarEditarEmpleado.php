<?php
include("presentacion/extremosRol/cabeza.php");
require_once("persistencia/Conexion.php");
require_once("logica/TipoId.php");
require_once("logica/Empleado.php");

$idPersona = isset($_POST["id_Persona"]) ? $_POST["id_Persona"] : null;
$Nombre    = isset($_POST["nombre"]) ? $_POST["nombre"] : null;
$TipoId    = isset($_POST["idId"]) ? $_POST["idId"] : null;
$Correo    = isset($_POST["correo"]) ? $_POST["correo"] : null;
$Telefono  = isset($_POST["telefono"]) ? $_POST["telefono"] : null;
$Direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : null;
$Clave     = isset($_POST["password"]) ? $_POST["password"] : null;
$ConfClave = isset($_POST["c_password"]) ? $_POST["c_password"] : null;

echo "idPersona :".$idPersona ;
echo "Nombre    :".$Nombre    ;
echo "TipoId    :".$TipoId    ;
echo "Correo    :".$Correo    ;
echo "Telefono  :".$Telefono  ;
echo "Direccion :".$Direccion ;
echo "Clave     :".$Clave     ;
echo "ConfClave :".$ConfClave ;

if ($Clave !== null && $ConfClave !== null) {

    if ($Clave !== $ConfClave) {
        echo '<div class="alert alert-danger text-center mt-3">Las contraseñas no coinciden.</div>';
        return;
    } else {
        // Validar que todos los campos requeridos existan
        if ($idPersona && $Nombre && $TipoId && $Correo && $Telefono && $Direccion) {
            echo '<div class="alert alert-success text-center mt-3">Empleado registrado correctamente.</div>';
        } else {
            echo '<div class="alert alert-warning text-center mt-3">Faltan campos obligatorios.</div>';
        }
    }
}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Crear nuevo empleado
            </button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Formulario de Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_Persona" class="form-label">Número de identificación</label>
                        <input type="text" class="form-control" id="id_Persona" name="id_Persona" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="idId" class="form-label">Tipo de identificación</label>
                        <select class="form-select" name="idId" id="idId" required>
                            <option value="">Seleccione...</option>
                            <?php
                            $tipoId = new TipoId();
                            $tipos = $tipoId->MostrarTiposId();
                            foreach ($tipos as $tip) {
                                echo "<option value='" . $tip->getIdTipo() . "'>" . $tip->getNombreTipo() . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="c_password" class="form-label">Repetir contraseña</label>
                        <input type="password" class="form-control" id="c_password" name="c_password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    form.addEventListener("submit", function (e) {
        const pass = document.getElementById("password").value;
        const cpass = document.getElementById("c_password").value;
        if (pass !== cpass) {
            e.preventDefault();
            alert("Las contraseñas no coinciden.");
        }
    });
});
</script>

<?php include("presentacion/extremosRol/pie.php"); ?>
