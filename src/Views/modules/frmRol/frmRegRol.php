<?php

use PHP\Controllers\RolControlador;
use PHP\Controllers\TemplateControlador;

$rolControlador = new RolControlador();
$request = $rolControlador->registrarRolControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
	<h2 class="text-center">Registrar Perfil</h2>
	<hr>
	<?php TemplateControlador::response(
			$request,
			"",
			"Ocurrio un error, Intentelo de nuevo"
		); ?>
	<form class="form" method="post">
		<label for="" class="form-label">Nombre del perfil</label>
		<input type="text" name="nombrePerfil" class="form-control" required>
		<br>

		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="submit" name="regRol" class="btn btn-success">Registrar</button>
		</div>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
			<a href="index.php?folder=frmRol&view=frmConRol">Consultar Perfil</a>
		</div>
	</form>
</div>