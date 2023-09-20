<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
	TemplateControlador::redirect("index.php?view=login");
}
?>

<div class="col-12 col-sm-12 col-md-11 col-lg-10 mx-auto">
	<h2 class="mt-4 text-center">Tipos de Arroz</h2>

	<div class="card mb-4">
		<div class="card-body">
			<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
				<a href="index.php?folder=frmAlmArroz&view=frmAlmRegArroz" class="btn btn-outline-secondary">
					<i class="fas fa-reply me-2"></i>Atrás
				</a>
				<button type="button" class="btn btn-outline-dark" id="btn-reload">
					<i class="fas fa-repeat"></i>
				</button>
			</div>

			<hr>

			<div class="table-responsive">
				<table class="table table-hover table-sm w-100" id="table-menu">
					<thead>
						<tr>
							<th>Nombre del Arroz</th>
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
			<div class="modal-header bg-success">
				<h5 class="modal-title text-white" id="modal-arroz-menus-editLabel">Edición</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<input type="hidden" class="form-control mb-3" id="idNutriArroz_e">
				<input type="text" class="form-control" id="nutriArrozNombre_e">
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="btn-delete-tipo-menu">
					<i class="fas fa-file-times me-2"></i>Eliminar
				</button>
				<button type="button" class="btn btn-warning" id="btn-update-tipo-menu">
					<i class="fas fa-file-edit me-2"></i>Actualizar
				</button>
			</div>
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
		axios.get(`${host}/api/frmAlmArroz/arroz`).then(res => {
			if (!res.data.status) {
				new DataTable('#table-menu', {
					data: res.data,
					destroy: true,
					responsive: true,
					language: {
						url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json",
					},
					columns: [
						{ data: 'nutriArrozNombre' },
						],
					createdRow: (html, row, index) => {
						html.setAttribute("role", "button");
						html.addEventListener("click", () => {
							document.getElementById("idNutriArroz_e").value = row.idNutriArroz;
							document.getElementById("nutriArrozNombre_e").value = row.nutriArrozNombre;
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
	const btn_delete = document.getElementById("btn-delete-tipo-menu");
	const btn_update = document.getElementById("btn-update-tipo-menu");

	// ENVIO A LA API LA FUNCION DE ELIMINAR
	if (btn_delete) {
		btn_delete.addEventListener("click", () => {
			if (confirm("Está seguro de eleminar este menu?")) {
				const idNutriArroz_e = document.getElementById("idNutriArroz_e").value;

				axios.delete(`${host}/api/frmAlmArroz/arroz/${idNutriArroz_e}`).then(res => {
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
				const idNutriArroz_e = document.getElementById("idNutriArroz_e").value;
				const form = {
					nutriArrozNombre: document.getElementById("nutriArrozNombre_e").value
				};

				axios.put(`${host}/api/frmAlmArroz/arroz/${idNutriArroz_e}`, form)
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