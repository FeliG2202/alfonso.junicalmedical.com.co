<?php

use PHP\Controllers\PersonaControlador;
use PHP\Controllers\TemplateControlador;

$personaControlador = new PersonaControlador();
$request = $personaControlador->registrarPersonaControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
	<h2 class="text-center">Registrar personas</h2>
	<hr>
	<?php TemplateControlador::response(
		$request,
		"",
		"Ocurrio un error, Intentelo de nuevo"
	); ?>

	<form class="form" method="post">
		<label for="" class="form-label">Nombre Completo</label>
		<input type="text" name="nombreCompleto" class="form-control" required>

		<label for="" class="form-label">Numero de Identificacion</label>
		<input type="number" name="identificacion" class="form-control" required>

		<label for="" class="form-label">Correo Electronico</label>
		<input type="email" name="email" class="form-control" required>

		<label for="" class="form-label">Numero Telefonico</label>
		<input type="number" name="cell" class="form-control" required>
		<br>


		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="submit" name="regPersona" class="btn btn-success">Registrar</button>
		</div>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
			<a href="index.php?folder=frmPersona&view=FrmConPersona">Consultar persona</a>
		</div>
	</form>
</div>