<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if ($_SESSION["rol"] != "pasajero") {
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}

$error = 0;
?>

<body>
    <?php
    include("presentacion/sesionPasajero.php");
    ?>
    <div
        class="container">
        <div
            class="row justify-content-center align-items-center g-2">
            <div class="col">
                <div class="card text-start">
                    <img class="card-img-top" src="holder.js/100px180/" alt="Title" />
                    <div class="card-body">
                        <h4 class="card-title">Editar usuario</h4>
                        <form action="" method="post">

                            <button type="submit">
                            Actualizar
                            </button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>

    </div>

</body>