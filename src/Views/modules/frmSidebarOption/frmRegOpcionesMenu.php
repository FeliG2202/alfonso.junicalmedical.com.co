<?php

use PHP\Controllers\OpcionesMenuControlador;
use PHP\Controllers\TemplateControlador;

$opcionMenuControlador = new OpcionesMenuControlador();
$datosMenu = $opcionMenuControlador->menuControlador->consultarMenuControlador();
$request = $opcionMenuControlador->registrarOpcionMenuControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<div class="col-lg-6 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
		<h2 class="text-center">Registrar Opciones Menú</h2>
		<hr>
		<?php TemplateControlador::response(
			$request,
			"Opcion de Menu Registrada Correctamente",
			"Ocurrio un error, Intentelo de nuevo"
		); ?>

		<form class="form" method="post">

			<div class="row mb-3">
				<!--////////////// PRIMERA PREGUNTA //////////////-->
				<label for="" class="form-label">Menú Principal</label>
				<select name="idMenu" class="form-control" required>
					<option value="">Seleccione un Menú</option>
					<?php
					foreach ($datosMenu as $keyMenu => $valueMenu) {
						print '<option value="' . $valueMenu['idMenu'] . '">' . $valueMenu['menuNombre'] . '</option>';
					}
					?>
				</select>
			</div>

			<div class="row mb-3">
				<label for="" class="form-label">Nombre Opción Menú</label>
				<input type="text" name="opcionMenuNombre" class="form-control" required>
			</div>

			<div class="row mb-3">
				<label for="" class="form-label">Nombre de la Carpeta</label>
				<input type="text" name="opcionesmenu_folder" class="form-control" required>
			</div>

			<div class="row mb-3">
				<label for="" class="form-label">Nonbre del Enlace</label>
				<input type="text" name="opcionMenuEnlace" class="form-control" required>
			</div>
			<br>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button type="submit" name="btnregOpcionMenu" class="btn btn-success">Registrar Menú</button>
			</div>
			<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
				<a href="FALTALAPAGINA">Consultar Opciones Menú</a>
			</div>
		</form>
	</div>
