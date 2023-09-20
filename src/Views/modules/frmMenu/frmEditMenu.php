<?php

use PHP\Controllers\MenuControlador;
use PHP\Controllers\TemplateControlador;

$menuControlador = new MenuControlador();
$datosMenu = $menuControlador->consultarMenuIdControlador();
$request = $menuControlador->actualizarMenuControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}

if ($datosMenu[0]['menuEstado'] == "true") {
	$checkedTrue = 'checked';
	$checkedFalse = '';
} else {
	$checkedTrue = '';
	$checkedFalse = 'checked';
}

?>

<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
	<h2 class="text-center">Editar Menú Principal</h2>
	<hr>
	<?php TemplateControlador::response(
		$request,
		"",
		"Ocurrio un error, Intentelo de nuevo"
	); ?>
	<form class="form" method="post">
		<label for="" class="form-label">Nombres del Perfil</label>
		<input type="text" name="menuNombre" value="<?php print $datosMenu[0]['menuNombre'] ?>" class="form-control">
		<br>

		<div class="form-check">
			<input class="form-check-input" type="radio" name="menuEstado" id="menuEstado1" value="true" <?php print $checkedTrue ?>>
			<label class="form-check-label" for="menuEstado1">Activo</label>
		</div>

		<div class="form-check">
			<input class="form-check-input" type="radio" name="menuEstado" id="menuEstado2" value="false" <?php print $checkedFalse ?>>
			<label class="form-check-label" for="menuEstado2">Inactivo</label>
		</div>


		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="submit" name="updMenu" class="btn btn-success">Actualizar</button>
		</div>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
			<a href="index.php?folder=frmMenu&view=frmConMenu">Consultar Menú Principal</a>
		</div>
	</form>
</div>