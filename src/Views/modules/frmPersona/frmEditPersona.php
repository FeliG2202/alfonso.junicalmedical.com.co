<?php

use PHP\Controllers\PersonaControlador;
use PHP\Controllers\TemplateControlador;

$personaControlador = new PersonaControlador();
$request = $personaControlador->actualizarPersonaControlador();
$datosPersona = $personaControlador->consultarPersonaIdControlador();

if ($request != null) {
    if ($request->request) {
        TemplateControlador::redirect($request->url);
    }
}
?>

<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
    <h2 class="text-center">Nombres de la Persona</h2>
    <hr>
    <?php TemplateControlador::response(
        $request,
        "",
        "Ocurrio un error, Intentelo de nuevo"
    ); ?>
    <form class="form" method="post">
        <label for="validationCustom01" class="form-label">Nombre Completo</label>
        <input type="text" name="nombreCompleto" value="<?php print $datosPersona[0]['personaNombreCompleto'] ?>" class="form-control" required>

        <label for="" class="form-label">Numero de Identificacion</label>
        <input type="number" name="identificacion" value="<?php print $datosPersona[0]['personaDocumento'] ?>" class="form-control" required>

        <label for="" class="form-label">Correo Electronico</label>
        <input type="text" name="email" value="<?php print $datosPersona[0]['personaCorreo'] ?>" class="form-control" required>

        <label for="" class="form-label">Numero Telefonico</label>
        <input type="number" name="cell" value="<?php print $datosPersona[0]['personaNumberCell'] ?>" class="form-control" required>
        <br>



        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" name="updPersona" class="btn btn-success">Actualizar</button>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
            <a href="index.php?folder=frmPersona&view=FrmConPersona">Consultar Personas</a>
        </div>
    </form>
</div>