<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
	TemplateControlador::redirect("index.php?view=login");
}
?>
<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
	<h2 class="text-center">Horario de dietas.</h2>
	<hr>
	<div id="alert-container"></div>

	<form class="form" id="form-create-hora">
		<div class="row">
			<div class="mb-3 col-6">
				<label for="horainicio" class="form-label">Hora de inicio</label>
				<input type="time" class="form-control" id="horainicio" name="horainicio" required>
			</div>
			<div class="mb-3 col-6">
				<label for="horafinal" class="form-label">Hora de final</label>
				<input type="time" class="form-control" id="horafinal" name="horafinal" required>
			</div>
		</div>
		<br>

		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="submit" id="regAlmHora" class="btn btn-success">Actualizar</button>
		</div>
	</form>
</div>

<script>
	function obtenerHoraDesdeAPI() {
		axios.get(`${host}/api/frmHora/read`)
		.then(function (response) {
                // Manejar la respuesta exitosa
			const nutriHoraObj = response.data[0];

                // Actualizar los valores de los inputs con los valores obtenidos de la API
			document.getElementById('horainicio').value = nutriHoraObj.nutriHoraInicio;
			document.getElementById('horafinal').value = nutriHoraObj.nutriHoraFinal;
		})
		.catch(function (error) {
                // Manejar errores
			console.error('Error al obtener la hora desde la API:', error);
		});
	}

	function actualizarHoraEnAPI() {
        const idNutriHora = 1; // Obtén el ID de NutriHora de alguna manera (puede variar dependiendo de tu lógica)

        const nuevaHoraInicio = document.getElementById('horainicio').value;
        const nuevaHoraFinal = document.getElementById('horafinal').value;

        axios.put(`${host}/api/frmHora/update/${idNutriHora}`, {
        	nutriHoraInicio: nuevaHoraInicio,
        	nutriHoraFinal: nuevaHoraFinal
        })
        .then(function (res) {
        	handleNetworkResponse(res);
        	console.log('Hora actualizada con éxito:', res.data);
        })
        .catch(function (err) {
        	handleNetworkError(err.response);
        	console.error('Error al actualizar la hora en la API:', err);
        });
    }

    window.onload = function () {
    	obtenerHoraDesdeAPI();

        // Agregar evento al botón para actualizar la hora en la API
    	document.getElementById('regAlmHora').addEventListener('click', function (event) {
            event.preventDefault(); // Evitar que el formulario se envíe si es un formulario
            actualizarHoraEnAPI();
        });
    };
</script>
