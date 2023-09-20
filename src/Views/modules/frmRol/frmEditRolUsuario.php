<?php

use PHP\Controllers\RolUsuarioControlador;
use PHP\Controllers\TemplateControlador;

$usuarioRolControlador = new RolUsuarioControlador();
$datosUsuario = $usuarioRolControlador->usuarioControlador->consultarUsuarioControlador();
if (isset($_GET['id'])) {
	$datoRolUsuario = $usuarioRolControlador->consultarRolesUsuarioIdUsuarioControlador($_GET['id']);
}

$request = $usuarioRolControlador->actualizarRolUsuarioControlador();
if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}

$checked = '';
?>


<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
		<h2 class="text-center">Actualizar Perfiles a Usuario</h2>
		<hr>
		<?php
		if (isset($_GET['action'])) {
			if ($_GET['action'] == 'ok11') {
				print '<div class="alert alert-success" role="alert">
				Perfil Usuario Actualizado Correctamente
				</div>';
			} elseif ($_GET['action'] == 'fa11') {
				print '<div class="alert alert-danger" role="alert">
				Ocurrio un error, Intentelo de nuevo
				</div>';
			}
		}
		?>
		<form class="form" method="post">
			<label for="" class="form-label">Nombre del perfil</label>
			<select name="idUsuario" onchange="this.form.submit()" id="" class="form-select" disabled>
				<option value="">seleccione usuario</option>

				<?php
				foreach ($datosUsuario as $keyUsuario => $valueUsuario) {
					if (isset($_GET['id']) && $valueUsuario['idUsuario'] == $_GET['id']) {
						print '<option value="' . $valueUsuario['idUsuario'] . '" selected>' . $valueUsuario['usuarioLogin'] . '</option>';
					} else {
						print '<option value="' . $valueUsuario['idUsuario'] . '">' . $valueUsuario['usuarioLogin'] . '</option>';
					}
				}
				?>

			</select>
			<br>
			<!-- ZONA DE CHECKBOX -->
			<?php
			if (isset($datoRolUsuario)) {
				foreach ($datoRolUsuario as $keyRolUsuario => $valueRolUsuario) {
					if ($valueRolUsuario['usuarioRolEstado'] == 'true') {
						$checked = 'checked';
					} else {
						$checked = '';
					}
					print '<div class="form-check form-switch">';
					print '<input name= "idRolUsuario[]" class="form-check-input" value="' . $valueRolUsuario['idUsuarioRol'] . '" type="checkbox" id="flexSwitchCheckDefault" ' . $checked . ' >';
					print '<label class="form-check-label " for="flexSwitchCheckDefault' . $valueRolUsuario['idUsuarioRol'] . ' ' . $checked . '">' . $valueRolUsuario['rolNombre'] . '</label>';
					print '</div>';
				}
			}
			?>
			<br>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button type="submit" name="updRolUsuario" class="btn btn-success">Actualizar</button>
			</div>
			<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
				<a href="frmConRolUsuario">Consultar Rol Usuario</a>
			</div>
		</form>
	</div>
