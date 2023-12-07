<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
	TemplateControlador::redirect("index.php?view=login");
}
?>

<div class="col-12 col-sm-12 col-md-11 col-lg-10 mx-auto">
	<h2 class="mt-4 text-center">Pacientes</h2>

	<div class="card mb-4">
		<div class="card-body">
			<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
				<a href="index.php?folder=frmPaciente&view=frmPaciReg" class="btn btn-outline-secondary">
					<i class="fas fa-reply me-2"></i>Atrás
				</a>
				<button type="button" class="btn btn-outline-dark" id="btn-reload">
					<i class="fas fa-repeat"></i>
				</button>
			</div>

			<hr>
			<div id="alert-container"></div>

			<div class="table-responsive">
				<table class="table table-hover table-sm w-100" id="table-menu">
					<thead>
						<tr>
							<th>Numero de Identificación</th>
							<th>Nombre y Apellido</th>
							<th>Dieta</th>
							<th>Cama</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-arroz-menus-edit" tabindex="-1" aria-labelledby="modal-arroz-menus-editLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form" id="">
				<div class="modal-header bg-success">
					<h5 class="modal-title text-white" id="modal-arroz-menus-editLabel">Edición</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<input type="hidden" class="form-control mb-3" id="idPaciente">
					<div class="mb-3">
						<label for="pacienteDocumento" class="form-label">Numero de Identificación</label>
						<input type="number" class="form-control" id="pacienteDocumento" required>
					</div>
					<div class="mb-3">
						<label for="pacienteNombre" class="form-label">Nombre y Apellido</label>
						<input type="text" class="form-control" id="pacienteNombre" required>
					</div>
					<div class="mb-3">
						<label for="pacienteDieta" class="form-label">Dieta</label>
						<input type="text" name="pacienteDieta" id="pacienteDieta" class="form-control" required>
					</div>
					<div class="mb-3">
						<label for="pacienteCama" class="form-label">Cama</label>
						<input type="number" class="form-control" id="pacienteCama">
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" id="btn-delete">
						<i class="fas fa-file-times me-2"></i>Eliminar
					</button>
					<button type="button" class="btn btn-warning" id="btn-update">
						<i class="fas fa-file-edit me-2"></i>Actualizar
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- ================================backend================================== -->


<script type="text/javascript">
	const myModal = new bootstrap.Modal('#modal-arroz-menus-edit', {
		keyboard: false
	});

	// HACE LA CONSULTA A LA BASE DE DATOS Y TRAE LOS DATOS DE LA API
	// Y HACE LA FUNCION "CLICK" PARA EL MODAL
	function readTipos() {
		axios.get(`${host}/api/frmPaci/read`).then(res => {
			if (!res.data.status) {
				new DataTable('#table-menu', {
					data: res.data,
					destroy: true,
					responsive: true,
					language: {
						url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json",
					},
					columns: [
						{ data: 'pacienteDocumento' },
						{ data: 'pacienteNombre' },
						{ data: 'pacienteDieta' },
						{ data: 'pacienteCama' },
						],
					createdRow: (html, row, index) => {
						html.setAttribute("role", "button");
						html.addEventListener("click", () => {
							document.getElementById("idPaciente").value = row.idPaciente;
							document.getElementById("pacienteDocumento").value = row.pacienteDocumento;
							document.getElementById("pacienteNombre").value = row.pacienteNombre;
							document.getElementById("pacienteDieta").value = row.pacienteDieta;
							document.getElementById("pacienteCama").value = row.pacienteCama;
							myModal.show();
						});
					},
				});
			}
		});
	}

	const btn_reload = document.getElementById("btn-reload");

	if (btn_reload) {
		btn_reload.addEventListener("click", () => {
			readTipos();
		});
	}

	// DETERMINO LAS VARIABLE DE ELIMINAR Y ACTUALIZAR
	const btn_delete = document.getElementById("btn-delete");
	const btn_update = document.getElementById("btn-update");

	// ENVIO A LA API LA FUNCION DE ELIMINAR
	if (btn_delete) {
		btn_delete.addEventListener("click", () => {
			if (confirm("¿Está seguro de eleminar este paciente?")) {
				const idPaciente = document.getElementById("idPaciente").value;

				axios.delete(`${host}/api/frmPaci/delete/${idPaciente}`).then(res => {
					console.log(res)
					handleNetworkResponse(res);
					readTipos();
					myModal.hide();
				}).catch(err => {
					handleNetworkError(err.response);
				});
			}
		});
	}

	// ENVIO  A LA API LA FUNCION DE ACTUALIZAR
	if (btn_update) {
		btn_update.addEventListener("click", () => {
			if (confirm("¿Está seguro de actualizar este paciente?")) {
				const idPaciente = document.getElementById("idPaciente").value;
				const form = {
					pacienteDocumento: document.getElementById("pacienteDocumento").value,
					pacienteNombre: document.getElementById("pacienteNombre").value,
					pacienteDieta: document.getElementById("pacienteDieta").value,
					pacienteCama: document.getElementById("pacienteCama").value
				};

				axios.put(`${host}/api/frmPaci/update/${idPaciente}`, form)
				.then(res => {
					console.log(res.data)
					handleNetworkResponse(res);
					readTipos();
					myModal.hide();
				}).catch(err => {
					handleNetworkError(err.response);
				});
			}
		});
	}

	(function() {
		readTipos();
	})();
</script>