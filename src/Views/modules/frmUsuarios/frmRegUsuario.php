<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
	TemplateControlador::redirect("index.php?view=login");
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />


<div class="row">
	<div class="col-lg-8 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
		<h2 class="text-center">Usuario</h2>
		<hr>

		<div class="gap-2 d-md-flex justify-content-md-end my-2">
			<a href="/frmUsuarios/frmConUsuarios" class="btn btn-outline-secondary">
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
						<label for="usuarioLogin" class="form-label">Usuario</label>
						<input type="text" name="usuarioLogin" id="usuarioLogin" class="form-control" required>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<div class="mb-3">
						<label for="usuarioPassword" class="form-label">Contraseña</label>
						<input type="text" name="usuarioPassword" id="usuarioPassword" class="form-control" required>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<div class="mb-3">
						<label class="form-label" for="idRol">Perfil</label>
						<select id="idRol" name="idRol" class="form-select" required>
							<option value="" selected>Seleccione</option>
						</select>
					</div>
				</div>
			</div>

			<br>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button type="submit" id="btnUser" class="btn btn-success">Registrar</button>
			</div>
		</form>
	</div>
</div>

<script>
    $(document).ready(function() {
        // Initialize Select2
        $('#idPersona').select2({
            placeholder: 'Seleccione',
            allowClear: true
        });

        // Apply Bootstrap styles manually
        $('.select2-container').addClass('form-control');
    });
</script>

<!-- ================================backend================================== -->
<script type="text/javascript">

// FORMULARIO User
	uploadSelect([
		objectSelect('/api/frmRol/read', 'idRol', 'idRol', ['rolNombre']),
		objectSelect('/api/frmEmpl/read', 'idPersona', 'idPersona', ['personaDocumento','personaNombreCompleto'])
		]);

//REGISTRAR FORMULARIO
	addEvent(['form-create-user'], 'submit', (event) => {
		event.preventDefault();

		axios.post(`${host}/api/frmUser/create`, {
			idPersona: getInput("idPersona").value,
			usuarioLogin: getInput("usuarioLogin").value,
			usuarioPassword: getInput("usuarioPassword").value,
			idRol: getInput("idRol").value,
			btnUser: getInput("btnUser").value
		})
		.then(res => {
			if (res.data.status === "success") {
				window.location.href = `${host}/index.php?folder=frmUsuarios&view=frmConUsuarios`;
			}
		})
		.catch(err => {
			console.log(err);
		});
	});
// END FORMULARIO User

</script>

