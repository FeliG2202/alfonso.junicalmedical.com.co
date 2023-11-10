<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
	TemplateControlador::redirect("index.php?view=login");
}
?>
<div class="col-12 col-sm-12 col-md-11 col-lg-10 mx-auto">
	<h2 class="mt-4 text-center">Tipos de Ensaladas</h2>

	<div class="card mb-4">
		<div class="card-body">
			<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
				<a href="index.php?folder=frmAlmEnsal&view=frmAlmRegEnsal" class="btn btn-outline-secondary">
					<i class="fas fa-reply me-2"></i>Atrás
				</a>

				<button type="button" class="btn btn-outline-dark" id="btn-reload">
					<i class="fas fa-repeat"></i>
				</button>
			</div>

			<hr>

			<table class="table table-hover table-sm w-100" id="table-menu">
				<thead>
					<tr>
						<th>Descripción</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-ensal-menus-edit" tabindex="-1" aria-labelledby="modal-ensal-menus-editLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 class="modal-title text-white" id="modal-ensal-menus-editLabel">Edición</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<input type="hidden" class="form-control mb-3" id="idNutriEnsal_e">
				<input type="text" class="form-control" id="nutriEnsalNombre_e">
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="btn-delete-ensal-menu">
					<i class="fas fa-file-times me-2"></i>Eliminar
				</button>
				<button type="button" class="btn btn-warning" id="btn-update-ensal-menu">
					<i class="fas fa-file-edit me-2"></i>Actualizar
				</button>
			</div>
		</div>
	</div>
</div>

<!-- ================================backend================================== -->


<script type="text/javascript">
	const myModal = new bootstrap.Modal('#modal-ensal-menus-edit', {
		keyboard: false
	});

	// HACE LA CONSULTA A LA BASE DE DATOS Y TRAE LOS DATOS DE LA API
	// Y HACE LA FUNCION "CLICK" PARA EL MODAL
	function readTipos() {
		axios.get(`${host}/api/frmAlmEnsal/ensal`).then(res => {
			if (!res.data.status) {
				new DataTable('#table-menu', {
					data: res.data,
					destroy: true,
					responsive: true,
					language: {
						url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json",
					},
					columns: [
						{ data: 'nutriEnsalNombre' },
						],
					createdRow: (html, row, index) => {
						html.setAttribute("role", "button");
						html.addEventListener("click", () => {
							document.getElementById("idNutriEnsal_e").value = row.idNutriEnsal;
							document.getElementById("nutriEnsalNombre_e").value = row.nutriEnsalNombre;
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
	const btn_delete = document.getElementById("btn-delete-ensal-menu");
	const btn_update = document.getElementById("btn-update-ensal-menu");

	// ENVIO A LA API LA FUNCION DE ELIMINAR
	if (btn_delete) {
		btn_delete.addEventListener("click", () => {
			if (confirm("Está seguro de eleminar este menu?")) {
				const idNutriEnsal_e = document.getElementById("idNutriEnsal_e").value;

				axios.delete(`${host}/api/frmAlmEnsal/ensal/${idNutriEnsal_e}`).then(res => {
					console.log(res)
					readTipos();
					myModal.hide();
				}).catch(err => {

				});
			}
		});
	}

	// ENVIO  A LA API LA FUNCION DE ACTUALIZAR
	if (btn_update) {
		btn_update.addEventListener("click", () => {
			if (confirm("Está seguro de actualizar este menu?")) {
				const idNutriEnsal_e = document.getElementById("idNutriEnsal_e").value;
				const form = {
					nutriEnsalNombre: document.getElementById("nutriEnsalNombre_e").value
				};

				axios.put(`${host}/api/frmAlmEnsal/ensal/${idNutriEnsal_e}`, form)
				.then(res => {
					console.log(res.data)
					readTipos();
					myModal.hide();
				}).catch(err => {

				});
			}
		});
	}

	(function() {
		readTipos();
	})();
</script>
