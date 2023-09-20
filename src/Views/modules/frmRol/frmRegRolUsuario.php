<?php

use PHP\Controllers\RolUsuarioControlador;
use PHP\Controllers\TemplateControlador;

$usuarioRolControlador = new RolUsuarioControlador();
$datosUsuario = $usuarioRolControlador->usuarioControlador->consultarUsuarioControlador();
$datosRol = $usuarioRolControlador->rolControlador->consultarRolControlador();
if (isset($_POST['idUsuario'])) {
	$datosRolUsuario = $usuarioRolControlador->consultarRolesUsuarioIdUsuarioControlador($_POST['idUsuario']);
}

$request = $usuarioRolControlador->registrarRolUsuarioControlador();

$checked = '';
$disabled = '';

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>


<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">

	<h2 class="text-center">Registrar Rol Usuario</h2>
	<hr>
	<?php
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'ok10') {
			print '<div class="alert alert-success" role="alert">
				Perfil Usuario Registrado Correctamente
				</div>';
		} elseif ($_GET['action'] == 'fa10') {
			print '<div class="alert alert-danger" role="alert">
				Ocurrio un error, Intentelo de nuevo
				</div>';
		}
	}
	?>
	<form class="form" method="post">
		<label for="" class="form-label">Nombre del perfil</label>
		<select name="idUsuario" onchange="this.form.submit()" id="" class="form-select">
			<option value="">seleccione usuario</option>
			<?php
			foreach ($datosUsuario as $keyUsuario => $valueUsuario) {
				if (isset($_POST['idUsuario']) && $valueUsuario['idUsuario'] == $_POST['idUsuario']) {
					print '<option value="' . $valueUsuario['idUsuario'] . '" selected>' . $valueUsuario['usuarioLogin'] . '</option>';
				} else {
					print '<option value="' . $valueUsuario['idUsuario'] . '">' . $valueUsuario['usuarioLogin'] . '</option>';
				}
			}
			?>
		</select>
		<br>

		<?php
		foreach ($datosRol as $keyRol => $valueRol) {
			if (isset($datoRolUsuario)) {
				foreach ($datoRolUsuario as $keyRolUsuario => $valueRolUsuario) {
					if ($valueRol['idRol'] == $valueRolUsuario['idRol'] && $valueRolUsuario['usuarioRolEstado'] == 'true') {
						$checked = ' checked';
						$disabled = ' disabled';
						break;
					} else {
						$checked = '';
						$disabled = '';
					}
				}
			} else {
				$checked = '';
				$disabled = '';
			}
			print '<div class="form-check form-switch">';
			print '<input name= "idRoles[]" class="form-check-input" value="' . $valueRol['idRol'] . '" type="checkbox" id="flexSwitchCheckDefault" ' . $checked . ' ' . $disabled . '>';
			print '<label class="form-check-label " for="flexSwitchCheckDefault' . $valueRol['idRol'] . ' ' . $checked . ' ' . $disabled . '">' . $valueRol['rolNombre'] . '</label>';
			print '</div>';
		}
		?>
		<br>

		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="submit" name="regRolUsuario" class="btn btn-success">Registrar</button>
		</div>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
			<a href="index.php?folder=frmRol&view=frmConRolUsuario">Consultar Rol Usuario</a>
		</div>
	</form>
</div>