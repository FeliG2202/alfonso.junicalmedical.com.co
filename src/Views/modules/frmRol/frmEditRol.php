<?php

use PHP\Controllers\RolControlador;
use PHP\Controllers\TemplateControlador;

$rolControlador = new RolControlador();
$request = $rolControlador->actualizarRolControlador();
$datosRol = $rolControlador->consultarRolIdControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>


<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
	<h2 class="text-center">Editar Perfil</h2>
	<hr>
	<?php TemplateControlador::response(
		$request,
		"",
		"Ocurrio un error, Intentelo de nuevo"
	); ?>
	<form class="form" method="POST">
		<label for="" class="form-label">Nombres del Perfil</label>
		<input type="text" name="nombre" value="<?php print $datosRol[0]['rolNombre'] ?>" class="form-control" required>
		<br>

		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="submit" name="updRol" class="btn btn-success">Actualizar</button>
		</div>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
			<a href="index.php?folder=frmRol&view=frmConRol">Consultar Perfil</a>
		</div>
	</form>
</div>