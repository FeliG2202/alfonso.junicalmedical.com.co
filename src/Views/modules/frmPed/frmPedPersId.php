<?php
use PHP\Controllers\PedAlmMenuControlador;
use PHP\Controllers\TemplateControlador;

$PedAlmMenuControlador = new PedAlmMenuControlador();
$request = $PedAlmMenuControlador->procesarFormulario();

if ($request != null) {
    if ($request->request) {
        TemplateControlador::redirect($request->url);
    }
}
?>

<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 rounded shadow-sm">
    <h2 class="text-center">Dietas</h2>
    <hr>

    <div id="contenedor1" style="display: none;">
        <?php TemplateControlador::response(
            $request,
            "",
            "Usuario no Autorizado"
        ); ?>

        <form class="form" method="POST">
            <div class="row mb-3">
                <label for="identMenu" class="form-label">Número de identificación</label>
                <input type="number" name="identMenu" class="form-control" required id="identMenu">
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" name="btnPedDatosPers" class="btn btn-success">Siguiente</button>
            </div>
        </form>
    </div>

    <div id="contenedor2" style="display: none;">
        <div class="alert alert-warning">
        </div>
    </div>
</div>


<script>

    window.addEventListener('DOMContentLoaded', (event) => {
        document.getElementById('identMenu').focus();
    });

    function contenedor1() {
    // Código para mostrar el contenedor 1
        document.getElementById('contenedor1').style.display = 'block';
        document.getElementById('contenedor2').style.display = 'none';
    }

    function contenedor2() {
    // Código para mostrar el contenedor 2
        document.getElementById('contenedor1').style.display = 'none';
        document.getElementById('contenedor2').style.display = 'block';
    }


// Función principal
    function obtenerHoraActual() {
        return new Date();
    }

    function verificarHora() {
        fetch(`${host}/api/frmHora/read`)
        .then(response => response.json())
        .then(api_data => {
            let hora_actual = new Date();
            let hora_inicio = api_data[0]['nutriHoraInicio'].split(':').map(Number);
            let hora_fin = api_data[0]['nutriHoraFinal'].split(':').map(Number);

            if ((hora_actual.getHours() > hora_inicio[0] || (hora_actual.getHours() == hora_inicio[0] && hora_actual.getMinutes() >= hora_inicio[1])) &&
                (hora_actual.getHours() < hora_fin[0] || (hora_actual.getHours() == hora_fin[0] && hora_actual.getMinutes() <= hora_fin[1]))) {
                contenedor1();
        } else {
            contenedor2();
            document.querySelector('#contenedor2 .alert').innerHTML = `<strong>Nota: </strong>El horario para solicitar el menú comienza desde las <strong>${api_data[0]['nutriHoraInicio']}</strong> hasta las <strong>${api_data[0]['nutriHoraFinal']}</strong>`;
        }
    });
    }

// Ejecutar la función principal
    verificarHora();
</script>
