<?php

use PHP\Controllers\PersonaControlador;
use PHP\Controllers\TemplateControlador;
use PHP\Controllers\UsuarioControlador;

$usuarioControlador = new UsuarioControlador();
$registrarUsuario = $usuarioControlador->registrarUsuarioControlador();
$request = $usuarioControlador->registrarUsuarioControlador();

$listarPersonasControlador = new PersonaControlador();
$listarPersona = $listarPersonasControlador->listarPersonasControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>


<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
	<h2 class="text-center">Registrar Usuarios</h2>
	<hr>
	<?php TemplateControlador::response(
		$request,
		"",
		"Ocurrio un error, Intentelo de nuevo"
	); ?>
	<form class="form" method="post">
		<label for="" class="form-label">Nombre Usuario</label>
		<input type="text" class="form-control" name="usuario" placeholder="Nombre Usuario" required>
		<label for="" class="form-label">Password</label>
		<input type="text" class="form-control" name="password" placeholder="Contraseña" required>
		<label>Persona</label>
		<select name="idPersonas" class="form-control" required>
			<option value="">Persona</option>
			<?php
			foreach ($listarPersona as $key => $value) {
				print '
					<option value="' . $value['idPersona'] . '">' . $value['personaNombres'] . ' ' . $value['personaDocumento'] . '</option>';
			}
			?>
		</select>
		<br>

		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="submit" name="regUsuario" class="btn btn-success">Registrar</button>
		</div>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
			<a href="index.php?folder=frmUsuarios&view=frmConUsuarios">Consultar Usuarios</a>
		</div>
	</form>
</div>