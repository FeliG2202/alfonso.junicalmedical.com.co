<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
	TemplateControlador::redirect("index.php?view=login");
}
?>

<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
	<h2 class="text-center">Acompañamiento</h2>
	<hr>

	<div class="gap-2 d-md-flex justify-content-md-end my-2">
		<a href="index.php?folder=frmAlmAcomp&view=frmAlmConAcomp" class="btn btn-outline-secondary">
			<i class="fas fa-search me-2"></i>Consultar
		</a>
	</div>

	<form class="form" id="form-create-acomp">
		<div class="row mb-3">
			<label for="" class="form-label">Descripción</label>
			<input type="text" id="nutriAcompNombre" class="form-control" required>
		</div>
		<br>

		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="submit" id="regAlmAcomp" class="btn btn-success">Registrar</button>
		</div>

	</form>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">
	document.getElementById("form-create-acomp").addEventListener("submit", (event) => {
		event.preventDefault();

		axios.post(`${host}/api/frmAlmAcomp/acomp`, {
			nutriAcompNombre: getInput("nutriAcompNombre").value,
			regAlmAcomp: getInput("regAlmAcomp").value
		})
		.then(res => {
            // console.log(res);
			if (res.data.status === "success") {
				window.location.href = `${host}/index.php?folder=frmAlmAcomp&view=frmAlmConAcomp`;
			}
		})
		.catch(err => {
			console.log(err);
		});
	});
</script>