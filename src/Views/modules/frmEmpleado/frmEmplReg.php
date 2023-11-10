<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
    TemplateControlador::redirect("index.php?view=login");
}
?>

<div class="row">
    <div class="col-lg-8 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
        <h2 class="text-center">Empleado</h2>
        <hr>

        <div class="gap-2 d-md-flex justify-content-md-end my-2">
            <a href="index.php?folder=frmEmpleado&view=frmEmplCon" class="btn btn-outline-secondary">
                <i class="fas fa-search me-2"></i>Consultar
            </a>
        </div>

        <form class="form" id="form-create-empl">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="personaDocumento" class="form-label">Numero de Identificación</label>
                        <input type="number" name="personaDocumento" id="personaDocumento" class="form-control" required>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="personaNombreCompleto" class="form-label">Nombre y Apellido</label>
                        <input type="text" name="personaNombreCompleto" id="personaNombreCompleto" class="form-control" required>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="personaCorreo" class="form-label">Correo Electrónico</label>
                        <input type="email" name="personaCorreo" id="personaCorreo" class="form-control" required>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="personaNumberCell" class="form-label">Numero de Celular</label>
                        <input type="number" name="personaNumberCell" id="personaNumberCell" class="form-control">
                    </div>
                </div>
            </div>

            <br>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" id="btnEmpl" class="btn btn-success">Registrar</button>
            </div>
        </form>
    </div>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">

//REGISTRAR FORMULARIO
    addEvent(['form-create-empl'], 'submit', (event) => {
        event.preventDefault();

        axios.post(`${host}/api/frmEmpl/create`, {
            personaDocumento: getInput("personaDocumento").value,
            personaNombreCompleto: getInput("personaNombreCompleto").value,
            personaCorreo: getInput("personaCorreo").value,
            personaNumberCell: getInput("personaNumberCell").value,
            btnEmpl: getInput("btnEmpl").value
        })
        .then(res => {
            if (res.data.status === "success") {
                window.location.href = `${host}/index.php?folder=frmEmpleado&view=frmEmplCon`;
            }
        })
        .catch(err => {
            console.log(err);
        });
    });
// END FORMULARIO User

</script>

