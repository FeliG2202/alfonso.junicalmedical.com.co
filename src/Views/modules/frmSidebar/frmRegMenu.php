<?php

use PHP\Controllers\MenuControlador;
use PHP\Controllers\TemplateControlador;

$menuControlador = new MenuControlador();
$request = $menuControlador->registrarMenuControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
		<h2 class="text-center">Registrar Menú Principal</h2>
		<hr>
		<?php TemplateControlador::response(
			$request,
			"Menu Registrado Correctamente",
			"Ocurrio un error, Intentelo de nuevo"
		); ?>
		<form class="form" method="post">
			<div class="row mb-3">
				<label for="" class="form-label">Nombre del perfil</label>
				<input type="text" name="nombreMenu" class="form-control" required>
			</div>
			<br>
			
			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button type="submit" name="btnRegMenu" class="btn btn-success">Registrar</button>
			</div>
			<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
				<a href="/frmMenu/frmConMenu">Consultar Menú Principal</a>
			</div>
		</form>
	</div>



