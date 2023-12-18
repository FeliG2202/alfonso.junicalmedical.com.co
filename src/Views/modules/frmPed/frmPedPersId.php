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

    <?php
    $hora_actual = date('H:i');
    $hora_inicio = '06:00';
    $hora_fin = '10:00';

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
        <strong>7:00 AM</strong> hasta las <strong>10:00 AM</strong>
    </div>
<?php } ?>


<script>
        // Add JavaScript to automatically select the input field when the view loads
    window.addEventListener('DOMContentLoaded', (event) => {
        document.getElementById('identMenu').focus();
    });
</script>
