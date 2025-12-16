<?php
include_once("presentacion/extremosRol/cabeza.php");
require_once("persistencia/Conexion.php");
require_once("logica/Empleado.php");
?>
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Listado de Empleados</h5>
                </div>
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand">Buscar</a>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">ID Empleado</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Dirección</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $conexion = new Conexion();
                                $empleado = new Empleado();
                                $empleados = $empleado->MostrarEmpleados();
                                foreach ($empleados as $emp) {
                                    echo "<tr>";
                                    echo "<td class='text-center'>" . $emp->getId() . "</td>";
                                    echo "<td class='text-center'>" . $emp->getIdEmpleado() . "</td>";
                                    echo "<td>" . $emp->getNombre() . "</td>";
                                    echo "<td>" . $emp->getTelefono() . "</td>";
                                    echo "<td>" . $emp->getCorreo() . "</td>";
                                    echo "<td>" . $emp->getDireccion() . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted text-end">
                    Total empleados: <?= count($empleados); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once("presentacion/extremosRol/pie.php");
?>