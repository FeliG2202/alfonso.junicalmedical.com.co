<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 rounded shadow-sm">
    <h2 class="text-center">Dietas</h2>
    <hr>
    <div id="alert-container"></div>

    <?php
    if (isset($_GET['message']) && ($_GET['message'] === 'true' || $_GET['message'] === 'false')) {
        $messageValue = ($_GET['message'] === 'true') ? 'true' : 'false';
        $alertClass = ($messageValue === 'true') ? 'alert-success' : 'alert-danger';
        $alertText = ($messageValue === 'true') ? 'Registrado correctamente' : 'Error en el registro';
        ?>
        <div id="success-alert" class="alert <?php echo $alertClass; ?> alert-dismissible fade show" role="alert">
            <?php echo $alertText; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <div id="contenedor1" style="display: none;">
        <form class="form" id="form-consul-menu">
            <div class="row mb-3">
                <label for="pacienteDocumento" class="form-label">Número de identificación</label>
                <input type="number" id="pacienteDocumento" class="form-control" required>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" id="btnPedDatosPaci" class="btn btn-success">Siguiente</button>
            </div>
        </form>
    </div>

    <div id="contenedor2" style="display: none;">
        <div class="alert alert-warning">
        </div>
    </div>

</div>


<!-- ================================backend================================== -->
<script type="text/javascript">

 function contenedor1() {
    // Código para mostrar el contenedor 1
    document.getElementById('contenedor1').style.display = 'block';
    document.getElementById('contenedor2').style.display = 'none';
    seleccionarInput("pacienteDocumento");
}

function contenedor2() {
    // Código para mostrar el contenedor 2
    document.getElementById('contenedor1').style.display = 'none';
    document.getElementById('contenedor2').style.display = 'block';
}

// Función para ocultar la alerta
function hideAlert() {
    var alertElement = document.querySelector("#success-alert");
    if (alertElement) {
        alertElement.style.display = "none";
    }
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

    var alertElement = document.querySelector("#success-alert");

    if (alertElement) { // Verifica si alertElement no es null
        alertElement.style.display = "block";
        setTimeout(hideAlert, 3000);
    }
}

verificarHora();

getInput("form-consul-menu").addEventListener("submit", (event) => {
    event.preventDefault();

    axios.post(`${host}/api/frmPedPaci/paci`, {
        pacienteDocumento: getInput("pacienteDocumento").value,
        regAlmTipo: getInput("btnPedDatosPaci").value
    })
    .then(({ data }) => {
        console.log(data);
        if (data.status) {
            console.log(data.idPaciente);
        } else {
            window.location.href = `${host}/index.php?folder=frmPedPaci&view=frmPedDatosPaci&idPaciente=${data.idPaciente}`;
        }
    })
    .catch(err => {
       handleNetworkResponse(err.response);
   });
});

</script>