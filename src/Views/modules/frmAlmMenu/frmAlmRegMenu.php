<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
	TemplateControlador::redirect("index.php?view=login");
}
?>
<div class="col-12 col-sm-12 col-md-11 col-lg-11 mx-auto my-3 p-3 rounded shadow-sm">
	<div class="container">
		<div class="d-flex justify-content-start my-2">
			<button type="button" class="btn btn-outline-secondary ms-auto" id="Buttonnav"><i class="fad fa-window-restore"></i> Paciente</button>
		</div>
		<div id="empleado">
			<div class="p-2">
				<h2 class="text-center"><b>Menú Empleado</b></h2>
				<hr>
			</div>

			<div class="d-flex justify-content-start my-2">
				<a href="index.php?folder=frmAlmMenu&view=frmAlmConMenu" class="btn btn-outline-secondary ms-auto">
					<i class="fas fa-search me-2"></i>Consultar
				</a>
			</div>

			<!-- FORMULARIO DE EMPLEADO -->
			<form class="form" id="form-create-menu1">
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
							<select id="idNutriProte1" name="idNutriProte1" class="form-select">
								<option value="" selected>Seleccione</option>
							</select>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
						<div class="mb-3">
							<label class="form-label" for="idNutriEnerge1">Energetico</label>
							<select id="idNutriEnerge1" name="idNutriEnerge1" class="form-select">
								<option value="" selected>Seleccione</option>
							</select>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
						<div class="mb-3">
							<label class="form-label" for="idNutriAcomp1">Acompañamiento</label>
							<select id="idNutriAcomp1" name="idNutriAcomp1" class="form-select">
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
							<label class="form-label" for="idNutriSemana1">Semana</label>
							<select id="idNutriSemana1" name="idNutriSemana1" class="form-select" required>
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
		<div id="paciente" style="display: none;">
			<div class="p-2">
				<h2 class="text-center"><b>Menú Paciente</b></h2>
				<hr>
			</div>

			<!-- FORMULARIO DE PACIENTES -->
			<div class="gap-2 d-md-flex justify-content-md-end my-2">
				<a href="index.php?folder=frmAlmMenu&view=frmAlmConMenu" class="btn btn-outline-secondary">
					<i class="fas fa-search me-2"></i>Consultar
				</a>
			</div>

			<form class="form" id="form-create-menu2">
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
							<select id="idNutriProte2" name="idNutriProte2" class="form-select">
								<option value="" selected>Seleccione</option>
							</select>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
						<div class="mb-3">
							<label class="form-label" for="idNutriEnerge2">Energetico</label>
							<select id="idNutriEnerge2" name="idNutriEnerge2" class="form-select">
								<option value="" selected>Seleccione</option>
							</select>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
						<div class="mb-3">
							<label class="form-label" for="idNutriAcomp2">Acompañamiento</label>
							<select id="idNutriAcomp2" name="idNutriAcomp2" class="form-select">
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
							<label class="form-label" for="idNutriSemana2">Semana</label>
							<select id="idNutriSemana2" name="idNutriSemana2" class="form-select" required>
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

<!-- ================================backend================================== -->
<script type="text/javascript">
	// CAMBIAR DE VENTANA
$(document).ready(function(){
        $("#Buttonnav").click(function(){
            $("#empleado, #paciente").toggle();
            if($("#empleado").is(":visible")){
                $("#Buttonnav").html('<i class="fad fa-window-restore"></i> Paciente');
            }else{
                $("#Buttonnav").html('<i class="fas fa-window-restore"></i> Empleado');
            }
        });
    });

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
		objectSelect('/api/semana', 'idNutriSemana1', 'idNutriSemana', ['nutriSemanaid'])
		]);

	// REGISTRAR FORMULARIO
	addEvent(['form-create-menu1'], 'submit', (event) => {
		event.preventDefault();

		axios.post(`${host}/api/frmAlmMenu/menuEmple`, {
			idNutriTipo: getInput("idNutriTipo1").value,
			idNutriDias: getInput("idNutriDias1").value,
			idNutriSopa: getInput("idNutriSopa1").value,
			idNutriArroz: getInput("idNutriArroz1").value,
			idNutriProte: getInput("idNutriProte1").value,
			idNutriEnerge: getInput("idNutriEnerge1").value,
			idNutriAcomp: getInput("idNutriAcomp1").value,
			idNutriEnsal: getInput("idNutriEnsal1").value,
			idNutriSemana: getInput("idNutriSemana1").value,
			btnSaveAlmRegMenu: getInput("btnSaveAlmRegMenu1").value
		})
		.then(res => {
			if (res.data.status === "success") {
				window.location.href = `${host}/index.php?folder=frmAlmMenu&view=frmAlmConMenu`;
			}
		})
		.catch(err => {
			handleNetworkError(err.response);
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
		objectSelect('/api/semana', 'idNutriSemana2', 'idNutriSemana', ['nutriSemanaid'])
		]);

//REGISTRAR FORMULARIO
	addEvent(['form-create-menu2'], 'submit', (event) => {
		event.preventDefault();

		axios.post(`${host}/api/frmAlmMenu/menuPaci`, {
			idNutriTipo: getInput("idNutriTipo2").value,
			idNutriDias: getInput("idNutriDias2").value,
			idNutriSopa: getInput("idNutriSopa2").value,
			idNutriArroz: getInput("idNutriArroz2").value,
			idNutriProte: getInput("idNutriProte2").value,
			idNutriEnerge: getInput("idNutriEnerge2").value,
			idNutriAcomp: getInput("idNutriAcomp2").value,
			idNutriEnsal: getInput("idNutriEnsal2").value,
			idNutriSemana: getInput("idNutriSemana2").value,
			btnSaveAlmRegMenu: getInput("btnSaveAlmRegMenu2").value
		})
		.then(res => {
			if (res.data.status === "success") {
				window.location.href = `${host}/index.php?folder=frmAlmMenu&view=frmAlmConMenu`;
			}
		})
		.catch(err => {
			handleNetworkResponse(err);
		});
	});


// END FORMULARIO PACIENTES
</script>