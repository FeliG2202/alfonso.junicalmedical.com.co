<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
	TemplateControlador::redirect("index.php?view=login");
}
?>

<div class="col-12 col-sm-12 col-md-11 col-lg-10 mx-auto my-5 p-4 bg-gris rounded shadow-sm">
	<h2 class="text-center">Registrar Menu</h2>
	<hr>

	<div class="gap-2 d-md-flex justify-content-md-end my-2">
		<a href="index.php?folder=frmAlmMenu&view=frmAlmConMenu" class="btn btn-outline-secondary">
			<i class="fas fa-search me-2"></i>Consultar
		</a>
	</div>

	<form class="form" id="form-create-menu">
		<div class="row">
			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idNutriTipo">Tipo Menu</label>
					<select id="idNutriTipo" name="idNutriTipo" class="form-select" required autofocus>
						<option value="" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idNutriDias">Día</label>
					<select id="idNutriDias" name="idNutriDias" class="form-select" required>
						<option value="" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idNutriSopa">Sopa</label>
					<select id="idNutriSopa" name="idNutriSopa" class="form-select" required>
						<option value="" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idNutriArroz">Arroz</label>
					<select id="idNutriArroz" name="idNutriArroz" class="form-select" required>
						<option value="" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idNutriProte">Proteina</label>
					<select id="idNutriProte" name="idNutriProte" class="form-select" required>
						<option value="" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idNutriEnerge">Energetico</label>
					<select id="idNutriEnerge" name="idNutriEnerge" class="form-select" required>
						<option value="" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idNutriAcomp">Acompañamiento</label>
					<select id="idNutriAcomp" name="idNutriAcomp" class="form-select" required>
						<option value="" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idNutriEnsal">Ensalada</label>
					<select id="idNutriEnsal" name="idNutriEnsal" class="form-select" required>
						<option value="" selected>Seleccione</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
				<div class="mb-3">
					<label class="form-label" for="idNutriBebida">Bebida</label>
					<select id="idNutriBebida" name="idNutriBebida" class="form-select" required>
						<option value="" selected>Seleccione</option>
					</select>
				</div>
			</div>
		</div>

		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="submit" id="btnSaveAlmRegMenu" class="btn btn-success btn-block">Guardar</button>
		</div>
	</form>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">
	uploadSelect([
		objectSelect('/api/frmAlmTipo/tipo', 'idNutriTipo', 'idNutriTipo', ['nutriTipoNombre']),
		objectSelect('/api/dias', 'idNutriDias', 'idNutriDias', ['nutriDiasNombre']),
		objectSelect('/api/frmAlmSopa/sopa', 'idNutriSopa', 'idNutriSopa', ['nutriSopaNombre']),
		objectSelect('/api/frmAlmArroz/arroz', 'idNutriArroz', 'idNutriArroz', ['nutriArrozNombre']),
		objectSelect('/api/frmAlmProte/prote', 'idNutriProte', 'idNutriProte', ['nutriProteNombre']),
		objectSelect('/api/frmAlmEnerge/energe', 'idNutriEnerge', 'idNutriEnerge', ['nutriEnergeNombre']),
		objectSelect('/api/frmAlmAcomp/acomp', 'idNutriAcomp', 'idNutriAcomp', ['nutriAcompNombre']),
		objectSelect('/api/frmAlmEnsal/ensal', 'idNutriEnsal', 'idNutriEnsal', ['nutriEnsalNombre']),
		objectSelect('/api/frmAlmBebida/bebida', 'idNutriBebida', 'idNutriBebida', ['nutriBebidaNombre'])
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
</script>