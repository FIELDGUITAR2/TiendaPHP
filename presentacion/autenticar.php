<?php

// Sanitizar GET
$sesion = filter_input(INPUT_GET, "sesion", FILTER_SANITIZE_STRING);

if ($sesion === "false") {
	session_destroy();
	header("Location: index.php");
	exit;
}

$error = false;

// Verificar envío del formulario
if (isset($_POST["autenticar"])) {

	// Sanitizar entradas
	$correo = filter_input(INPUT_POST, "correo", FILTER_VALIDATE_EMAIL);
	$clave  = filter_input(INPUT_POST, "clave", FILTER_SANITIZE_STRING);

	if (!$correo || !$clave) {
		$error = true;
	} else {

		// --- ADMIN ---
		$admin = new Admin("", "", "", $correo, $clave);

		if ($admin->autenticar()) {
			$_SESSION["id"] = intval($admin->getId());
			$_SESSION["rol"] = "admin";

			header("Location: ?pid=" . base64_encode("presentacion/sesionAdmin.php"));
			exit;
		}

		// --- PILOTO ---
		$piloto = new Piloto("", "", "", $correo, $clave);

		if ($piloto->autenticar()) {
			$_SESSION["id"] = intval($piloto->getId());
			$_SESSION["rol"] = "piloto";

			header("Location: ?pid=" . base64_encode("presentacion/sesionPiloto.php"));
			exit;
		}

		// --- PASAJERO ---
		$pasajero = new Pasajero("", "", "", $correo, $clave);

		if ($pasajero->autenticar()) {
			$_SESSION["id"] = intval($pasajero->getId());
			$_SESSION["estadoPersona"] = intval($pasajero->getIdEstadoPersona());
			$_SESSION["rol"] = "pasajero";

			header("Location: ?pid=" . base64_encode("presentacion/sesionPasajero.php"));
			exit;
		}

		// Ningún rol autenticó
		$error = true;
	}
}
?>



<body class="bg-light">

	<?php include("presentacion/encabezado.php"); ?>

	<div class="container my-5">
		<div class="row">
			<div class="col-4"></div>
			<div class="col-4">
				<div class="card">
					<div class="card-header bg-success text-white">
						<h4>Autenticar</h4>
					</div>
					<div class="card-body">
						<form action="?pid=<?php echo base64_encode('presentacion/autenticar.php') ?>" method="post">
							<div class="mb-3">
								<input type="email" class="form-control" name="correo" placeholder="Correo" required>
							</div>
							<div class="mb-3">
								<input type="password" class="form-control" name="clave" placeholder="Clave" required>
							</div>
							<button type="submit" class="btn btn-warning" name="autenticar">Autenticar</button>
							<a href="?pid=<?php echo base64_encode('presentacion/cliente/registrarCliente.php') ?>">Registrarse</a>
						</form>

						<?php
						if ($error) {
							echo "<div class='alert alert-danger mt-3' role='alert'>Credenciales incorrectas</div>";
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>