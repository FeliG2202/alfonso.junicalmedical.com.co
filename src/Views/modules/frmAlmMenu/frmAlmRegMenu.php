<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
	TemplateControlador::redirect("index.php?view=login");
}
?>

<div class="col-12 col-sm-12 col-md-11 col-lg-10 mx-auto my-5 p-4 rounded shadow-sm">

	<div class="container">
		<div class="card">
			<div class="card-body">
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" data-toggle="tab" href="#Empleado" role="tab" aria-selected="true">Empleado</a>
						<a class="nav-item nav-link" data-toggle="tab" href="#Paciente" role="tab" aria-selected="false">Paciente</a>
					</div>
				</nav>

				<div class="tab-content " id="nav-tabContent">
					<div class="tab-pane fade show active" id="Empleado" role="tabpanel">
						<div class="p-2">
							<h2 class="text-center">Registrar Menu Empleado</h2>
							<hr>
						</div>

						<div class="gap-2 d-md-flex justify-content-md-end my-2">
							<a href="index.php?folder=frmAlmMenu&view=frmAlmConMenu" class="btn btn-outline-secondary">
								<i class="fas fa-search me-2"></i>Consultar
							</a>
						</div>

						<!-- FORMULARIO DE EMPLEADO -->
						<form class="form" id="form-create-menu">
							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriTipo1">Tipo Menu</label>
										<select id="idNutriTipo1" name="idNutriTipo1" class="form-select" required autofocus>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriDias1">Día</label>
										<select id="idNutriDias1" name="idNutriDias1" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriSopa1">Sopa</label>
										<select id="idNutriSopa1" name="idNutriSopa1" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriArroz1">Arroz</label>
										<select id="idNutriArroz1" name="idNutriArroz1" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriProte1">Proteina</label>
										<select id="idNutriProte1" name="idNutriProte1" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriEnerge1">Energetico</label>
										<select id="idNutriEnerge1" name="idNutriEnerge1" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriAcomp1">Acompañamiento</label>
										<select id="idNutriAcomp1" name="idNutriAcomp1" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriEnsal1">Ensalada</label>
										<select id="idNutriEnsal1" name="idNutriEnsal1" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriBebida1">Bebida</label>
										<select id="idNutriBebida1" name="idNutriBebida1" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>
							</div>

							<div class="d-grid gap-2 d-md-flex justify-content-md-end">
								<button type="submit" id="btnSaveAlmRegMenu1" class="btn btn-success btn-block">Guardar</button>
							</div>
						</form>
						<!-- END DE FORMULARIO DE EMPLEADOS -->
					</div>
					<div class="tab-pane fade" id="Paciente" role="tabpanel">

						<div class="p-2">
							<h2 class="text-center">Registrar Menu Paciente</h2>
							<hr>
						</div>

						<!-- FORMULARIO DE PACIENTES -->
						<div class="gap-2 d-md-flex justify-content-md-end my-2">
							<a href="index.php?folder=frmAlmMenu&view=frmAlmConMenu" class="btn btn-outline-secondary">
								<i class="fas fa-search me-2"></i>Consultar
							</a>
						</div>

						<form class="form" id="form-create-menu">
							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriTipo2">Tipo Menu</label>
										<select id="idNutriTipo2" name="idNutriTipo2" class="form-select" required autofocus>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriDias2">Día</label>
										<select id="idNutriDias2" name="idNutriDias2" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriSopa2">Sopa</label>
										<select id="idNutriSopa2" name="idNutriSopa2" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriArroz2">Arroz</label>
										<select id="idNutriArroz2" name="idNutriArroz2" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriProte2">Proteina</label>
										<select id="idNutriProte2" name="idNutriProte2" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriEnerge2">Energetico</label>
										<select id="idNutriEnerge2" name="idNutriEnerge2" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriAcomp2">Acompañamiento</label>
										<select id="idNutriAcomp2" name="idNutriAcomp2" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriEnsal2">Ensalada</label>
										<select id="idNutriEnsal2" name="idNutriEnsal2" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
									<div class="mb-3">
										<label class="form-label" for="idNutriBebida2">Bebida</label>
										<select id="idNutriBebida2" name="idNutriBebida2" class="form-select" required>
											<option value="" selected>Seleccione</option>
										</select>
									</div>
								</div>
							</div>

							<div class="d-grid gap-2 d-md-flex justify-content-md-end">
								<button type="submit" id="btnSaveAlmRegMenu2" class="btn btn-success btn-block">Guardar</button>
							</div>
						</form>
						<!-- END DE FORMULARIO DE PACIENTES -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">
	// FORMULARIO EMPLEADO
	uploadSelect([
		objectSelect('/api/frmAlmTipo/tipo', 'idNutriTipo1', 'idNutriTipo', ['nutriTipoNombre']),
		objectSelect('/api/dias', 'idNutriDias1', 'idNutriDias', ['nutriDiasNombre']),
		objectSelect('/api/frmAlmSopa/sopa', 'idNutriSopa1', 'idNutriSopa', ['nutriSopaNombre']),
		objectSelect('/api/frmAlmArroz/arroz', 'idNutriArroz1', 'idNutriArroz', ['nutriArrozNombre']),
		objectSelect('/api/frmAlmProte/prote', 'idNutriProte1', 'idNutriProte', ['nutriProteNombre']),
		objectSelect('/api/frmAlmEnerge/energe', 'idNutriEnerge1', 'idNutriEnerge', ['nutriEnergeNombre']),
		objectSelect('/api/frmAlmAcomp/acomp', 'idNutriAcomp1', 'idNutriAcomp', ['nutriAcompNombre']),
		objectSelect('/api/frmAlmEnsal/ensal', 'idNutriEnsal1', 'idNutriEnsal', ['nutriEnsalNombre']),
		objectSelect('/api/frmAlmBebida/bebida', 'idNutriBebida1', 'idNutriBebida', ['nutriBebidaNombre'])
		]);

	// REGISTRAR FORMULARIO
	addEvent(['form-create-menu'], 'submit', (event) => {
		event.preventDefault();

		axios.post(`${host}/api/frmAlmMenu/menu`, {
			idNutriTipo: getInput("idNutriTipo").value,
			idNutriDias: getInput("idNutriDias").value,
			idNutriSopa: getInput("idNutriSopa").value,
			idNutriArroz: getInput("idNutriArroz").value,
			idNutriProte: getInput("idNutriProte").value,
			idNutriEnerge: getInput("idNutriEnerge").value,
			idNutriAcomp: getInput("idNutriAcomp").value,
			idNutriEnsal: getInput("idNutriEnsal").value,
			idNutriBebida: getInput("idNutriBebida").value,
			btnSaveAlmRegMenu: getInput("btnSaveAlmRegMenu").value
		})
		.then(res => {
			if (res.data.status === "success") {
				window.location.href = `${host}/index.php?folder=frmAlmMenu&view=frmAlmConMenu`;
			}
		})
		.catch(err => {
			console.log(err);
		});
	});
// END FORMULARIO EMPLEADOS


// FORMULARIO PACIENTES
	uploadSelect([
		objectSelect('/api/frmAlmTipo/tipo', 'idNutriTipo2', 'idNutriTipo', ['nutriTipoNombre']),
		objectSelect('/api/dias', 'idNutriDias2', 'idNutriDias', ['nutriDiasNombre']),
		objectSelect('/api/frmAlmSopa/sopa', 'idNutriSopa2', 'idNutriSopa', ['nutriSopaNombre']),
		objectSelect('/api/frmAlmArroz/arroz', 'idNutriArroz2', 'idNutriArroz', ['nutriArrozNombre']),
		objectSelect('/api/frmAlmProte/prote', 'idNutriProte2', 'idNutriProte', ['nutriProteNombre']),
		objectSelect('/api/frmAlmEnerge/energe', 'idNutriEnerge2', 'idNutriEnerge', ['nutriEnergeNombre']),
		objectSelect('/api/frmAlmAcomp/acomp', 'idNutriAcomp2', 'idNutriAcomp', ['nutriAcompNombre']),
		objectSelect('/api/frmAlmEnsal/ensal', 'idNutriEnsal2', 'idNutriEnsal', ['nutriEnsalNombre']),
		objectSelect('/api/frmAlmBebida/bebida', 'idNutriBebida2', 'idNutriBebida', ['nutriBebidaNombre'])
		]);

	// REGISTRAR FORMULARIO
	// addEvent(['form-create-menu'], 'submit', (event) => {
	// 	event.preventDefault();

	// 	axios.post(`${host}/api/frmAlmMenu/menu`, {
	// 		idNutriTipo: getInput("idNutriTipo").value,
	// 		idNutriDias: getInput("idNutriDias").value,
	// 		idNutriSopa: getInput("idNutriSopa").value,
	// 		idNutriArroz: getInput("idNutriArroz").value,
	// 		idNutriProte: getInput("idNutriProte").value,
	// 		idNutriEnerge: getInput("idNutriEnerge").value,
	// 		idNutriAcomp: getInput("idNutriAcomp").value,
	// 		idNutriEnsal: getInput("idNutriEnsal").value,
	// 		idNutriBebida: getInput("idNutriBebida").value,
	// 		btnSaveAlmRegMenu: getInput("btnSaveAlmRegMenu").value
	// 	})
	// 	.then(res => {
	// 		if (res.data.status === "success") {
	// 			window.location.href = `${host}/index.php?folder=frmAlmMenu&view=frmAlmConMenu`;
	// 		}
	// 	})
	// 	.catch(err => {
	// 		console.log(err);
	// 	});
	// });
// END FORMULARIO PACIENTES
</script>