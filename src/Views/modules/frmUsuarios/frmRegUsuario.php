<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
	TemplateControlador::redirect("index.php?view=login");
}
?>

<div class="row">
	<div class="col-lg-8 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
		<h2 class="text-center">Usuario</h2>
		<hr>

		<div class="gap-2 d-md-flex justify-content-md-end my-2">
			<a href="index.php?folder=frmUsuarios&view=frmConUsuarios" class="btn btn-outline-secondary">
				<i class="fas fa-search me-2"></i>Consultar
			</a>
		</div>

		<form class="form" id="form-create-user">
			<div class="row">
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<div class="mb-3">
						<label class="form-label" for="idPersona">Nombre</label>
						<select id="idPersona" name="idPersona" class="form-select" required>
							<option value="" selected>Seleccione</option>
						</select>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<div class="mb-3">
						<label for="" class="form-label">Usuario</label>
						<input type="text" id="usuarioLogin" class="form-control" required>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<div class="mb-3">
						<label for="" class="form-label">Contraseña</label>
						<input type="text" id="usuarioPassword" class="form-control" required>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<label class="form-label" for="idRol">Perfil</label>
					<select id="idRol" name="idRol" class="form-select" required>
						<option value="" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<br>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button type="submit" id="btnUser" class="btn btn-success">Registrar</button>
			</div>
		</form>
	</div>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">
	uploadSelect([
		objectSelect('/api/frmRol/read', 'idRol', 'idRol', ['rolNombre']),
		objectSelect('/api/frmPerson/read', 'idPersona', 'idPersona', ['personaDocumento','personaNombreCompleto'])
		]);

	document.getElementById("form-create-user").addEventListener("submit", (event) => {
		event.preventDefault();

		axios.post(`${host}/api/frmUser/create`, {
			idPersona: document.getElementById("idPersona").value,
			usuarioLogin: document.getElementById("usuarioLogin").value,
			usuarioPassword: document.getElementById("usuarioPassword").value,
			idRol: document.getElementById("idRol").value,
			btnUser: document.getElementById("btnUser").value
		})
		.then(res => {
            // console.log(res);
			if (res.data.status === "success") {
				window.location.href = `${host}/index.php?folder=frmUsuarios&view=frmConUsuarios`;
			}
		})
		.catch(err => {
			console.log(err);
		});
	});
</script>

