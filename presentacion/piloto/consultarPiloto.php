<?php
if ($_SESSION["rol"] != "admin") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}
$error = 0;

?>

<body>
    <?php
    include("presentacion/encabezado.php");
    include("presentacion/menuAdmin.php");
    ?>
    <div class="container mt-4">

        <div class="card shadow-lg border-0">

            <!-- Encabezado -->
            <div class="card-header text-white"
                style="background: linear-gradient(90deg, #0b6623, #c9b200);">
                <h4 class="mb-0"><i class="fa-solid fa-user-tie"></i> Pilotos</h4>
                <!-- <input type="text" id="buscar" class="form-control" placeholder="Buscar piloto...">
                <div id="resultado"></div> -->
            </div>

            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-hover align-middle">
                        <thead class="text-white"
                            style="background-color: #0b6623;">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Fecha de Nacimiento</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $piloto = new Piloto();
                            $listaPilotos = $piloto->consultarPilotos();

                            foreach ($listaPilotos as $p) {
                                echo "<tr>";
                                echo "<td>" . $p->getId() . "</td>";
                                if ($p->getFoto() == null || $p->getFoto() == "") {

                                    try {
                                        throw new Exception("Foto no disponible");
                                    } catch (Exception $e) {
                                        error_log($e->getMessage());
                                    }

                                    echo "<td><img src='img/AltairAir.png' alt='Foto' 
                                    class='rounded-circle' 
                                    style='height:55px; width:55px; object-fit:cover;'></td>";
                                } else {

                                    echo "<td><img src='" . $p->getFoto() . "' alt='Foto' 
                                    class='rounded-circle' 
                                    style='height:55px; width:55px; object-fit:cover;'></td>";
                                }


                                echo "<td>" . $p->getNombre() . "</td>";
                                echo "<td>" . $p->getApellido() . "</td>";
                                echo "<td>" . $p->getCorreo() . "</td>";
                                echo "<td>" . $p->getTelefono() . "</td>";
                                echo "<td>" . $p->getFecha_nac() . "</td>";

                                // Estado con badge de color
                                $estado = $p->getIdEstadoPersona();
                                $color = ($estado == 1) ? "success" : "danger";

                                echo "<td><span class='badge bg-$color'>" . $estado . "</span></td>";
                                echo "<td>";
                            ?>
                                <form method="POST" action="?pid=<?php echo base64_encode('presentacion/piloto/actualizarPiloto.php'); ?>">
                                    <input type="hidden" name="id" value="<?php echo $p->getId(); ?>">
                                    <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                                </form>
                            <?php
                                echo "
                                      </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        
    </script>



    <!-- Modal Editar Piloto -->

    <?php /* 
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-header" style="background:#0b6623;">
                        <h5 class="modal-title text-white">Editar Piloto</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body row g-3">

                        <input type="hidden" name="idPiloto" id="editId">

                        <div class="col-md-6">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nombres" id="editNombre" required>
                        </div>

                        <div class="col-md-6">
                            <label>Apellido</label>
                            <input type="text" class="form-control" name="apellidos" id="editApellido" required>
                        </div>

                        <div class="col-md-6">
                            <label>Correo</label>
                            <input type="email" class="form-control" name="correo" id="editCorreo" required>
                        </div>

                        <div class="col-md-6">
                            <label>Teléfono</label>
                            <input type="text" class="form-control" name="telefono" id="editTelefono" required>
                        </div>

                        <div class="col-md-6">
                            <label>Fecha de Nacimiento</label>
                            <input type="date" class="form-control" name="fecha_nac" id="editFechaNac" required>
                        </div>

                        <div class="col-md-6">
                            <label>Estado</label>
                            <select class="form-select" name="idEstadoPersona" id="editEstado" required>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>

                        <div class="col-md-6 text-center">
                            <label>Foto</label>
                            <input class="form-control" type="file" name="foto">
                            <img id="editFotoPreview" src="" class="img-thumbnail mt-2"
                                style="height:80px; width:80px; object-fit:cover; border-radius:50%;">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success" name="actualizar">Guardar Cambios</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            let botones = document.querySelectorAll(".editarBtn");

            botones.forEach(boton => {
                boton.addEventListener("click", function() {

                    document.getElementById("editId").value = this.dataset.id;
                    document.getElementById("editNombre").value = this.dataset.nombre;
                    document.getElementById("editApellido").value = this.dataset.apellido;
                    document.getElementById("editCorreo").value = this.dataset.correo;
                    document.getElementById("editTelefono").value = this.dataset.telefono;
                    document.getElementById("editEstado").value = this.dataset.estado;

                    // Fecha
                    if (this.dataset.fechanac) {
                        document.getElementById("editFechaNac").value = this.dataset.fechanac;
                    }

                    // Foto previa
                    let foto = this.dataset.foto;
                    document.getElementById("editFotoPreview").src =
                        (foto && foto !== "") ? foto : "img/AltairAir.png";
                });
            });
        });
    </script>
*/ ?>

</body>