<?php

use PHP\Controllers\PedAlmMenuControlador;
use PHP\Controllers\TemplateControlador;

$pedAlmMenuControlador = new PedAlmMenuControlador();
$datosPersona = $pedAlmMenuControlador->consultarAlmMenuIdControlador();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $datosPersona;
}

$request = $pedAlmMenuControlador->validateCode();

if ($request != null) {
    if ($request->request) {
        TemplateControlador::redirect($request->url);
    }
}
?>

<div class="col-lg-8 mx-auto mt-5 mb-5 p-4 rounded shadow">
    <div class="row">
        <div class="col mb-3">
            <h2 class="text-center">Datos Personales</h2>
        </div>
    </div>

    <div class="form row mb-3">
        <div class="form-group col-md-6">
            <label class="mb-2">Número de Identifición</label>
            <input type="text" name="numIdent" value="<?php print($datosPersona->personaDocumento); ?>" class="form-control" readonly>
        </div>

        <div class="form-group col-md-6">
            <label class="mb-2">Nombre Completo</label>
            <input type="text" name="NombreComp" value="<?php print($datosPersona->personaNombreCompleto); ?>" class="form-control" readonly>
        </div>
    </div>

    <div class="form row mb-3">
        <div class="form-group col-md-6">
            <label class="mb-2">Numero de Celular</label>
            <input type="text" name="NumeroCelular" value="<?php print($datosPersona->personaNumberCell); ?>" class="form-control" readonly>
        </div>

        <div class="form-group col-md-6">
            <label class="mb-2">Correo Electronico</label>
            <input type="text" name="Correo" value="<?php print($datosPersona->personaCorreo); ?>" class="form-control" readonly>
        </div>
    </div>

    <hr>

    <div class="alert alert-warning">
        <strong>Nota: </strong>El código de verificación se ha enviado
        a la cuenta de correo asociada al usuario
    </div>

    <?php if ($request != null && !$request->request) {
        TemplateControlador::error($request->message);
    } ?>
    <form method="POST">
        <div class="form row mb-3">
            <div class="form-group col-md-6">
                <label class="mb-2">Código de verificación</label>
            </div>

                <div class="col m-0">
                    <input type="number" id="code-1" name="cod-1" maxlength="1" oninput="validarNumero(this, 'code-2', 'code-1')" class="form-control mb-0 m-0" required autocomplete="off">
                </div>

                <div class="col m-0">
                    <input type="number" id="code-2" name="cod-2" maxlength="1" oninput="validarNumero(this, 'code-3', 'code-1')" class="form-control mb-0 m-0" required autocomplete="off">
                </div>

                <div class="col m-0">
                    <input type="number" id="code-3" name="cod-3" maxlength="1" oninput="validarNumero(this, 'code-4', 'code-2')" class="form-control mb-0 m-0" required autocomplete="off">
                </div>

                <div class="col m-0">
                    <input type="number" id="code-4" name="cod-4" maxlength="1" oninput="validarNumero(this, 'code-5', 'code-3')" class="form-control mb-0 m-0" required autocomplete="off">
                </div>

                <div class="col m-0">
                    <input type="number" id="code-5" name="cod-5" maxlength="1" oninput="validarNumero(this, 'code-6', 'code-4')" class="form-control mb-0 m-0" required autocomplete="off">
                </div>

                <div class="col m-0">
                    <input type="number" id="code-6" name="cod-6" maxlength="1" oninput="validarNumero(this, 'code-7', 'code-5')" class="form-control mb-0 m-0" required autocomplete="off">
                </div>
            </div>


            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" id="submitForm" value="Siguiente" name="btnValCode" class="btn btn-warning">
            </div>
        </form>
    </div>

    <script>
        // Add JavaScript to automatically select the input field when the view loads
        window.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('code-1').focus();
        });
    </script>