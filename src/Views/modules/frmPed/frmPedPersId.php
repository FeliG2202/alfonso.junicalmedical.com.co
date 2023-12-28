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

$api_url = host . '/api/frmHora/read';
$api_response = file_get_contents($api_url);
$api_data = json_decode($api_response, true);

$hora_actual = new DateTime();
$hora_inicio = new DateTime($api_data['nutriHoraInicio']);
$hora_fin = new DateTime($api_data['nutriHoraFinal']);

echo $hora_fin->format('H:i');
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('identMenu').focus();
    });
</script>

<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 rounded shadow-sm">
    <h2 class="text-center">Dietas</h2>
    <hr>

    <?php
    if ($hora_actual >= $hora_inicio && $hora_actual <= $hora_fin) { ?>
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
<?php } else { ?>

    <div class="alert alert-warning">
        <strong>Nota: </strong>El horario para solicitar el menú comienza desde las
        <strong><?php echo $hora_inicio->format('H:i'); ?></strong> hasta las <strong><?php echo $hora_fin->format('H:i'); ?></strong>
    </div>
<?php } ?>
