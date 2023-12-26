<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 rounded shadow-sm">
    <h2 class="text-center">Dietas</h2>
    <hr>

    <?php
    $hora_actual = date('H:i');
    $hora_inicio = '06:00';
    $hora_fin = '24:00';
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

    <?php if ($hora_actual >= $hora_inicio && $hora_actual <= $hora_fin) { ?>
        <form class="form" id="form-consul-menu">
            <div class="row mb-3">
                <label for="pacienteDocumento" class="form-label">Número de identificación</label>
                <input type="number" id="pacienteDocumento" class="form-control" required>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" id="btnPedDatosPaci" class="btn btn-success">Siguiente</button>
            </div>
        </form>
    <?php } else { ?>
        <div class="alert alert-warning">
            <strong>Nota: </strong>El horario para solicitar el menú comienza desde las
            <strong>7:00 AM</strong> hasta las <strong>10:00 AM</strong>
        </div>
    <?php }
    ?>
</div>


<!-- ================================backend================================== -->
<script type="text/javascript">
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
            console.log(err);
        });
    });

    var alertElement = document.querySelector("#success-alert");

if (alertElement) { // Verifica si alertElement no es null
    alertElement.style.display = "block";
    setTimeout(hideAlert, 3000);
}
</script>