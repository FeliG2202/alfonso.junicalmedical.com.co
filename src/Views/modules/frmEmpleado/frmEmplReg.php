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

        <div class="d-flex justify-content-between my-2">
            <div>
                <a href="<?php echo(host); ?>/src/Views/assets/excel/empleados_registro.xlsx" class="btn btn-primary ms-2">
                    <i class="fad fa-download"></i>
                </a>
            </div>
            <div class="gap-2 d-md-flex">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fad fa-file-upload"></i>
                </button>
                <a href="/frmEmpleado/frmEmplCon" class="btn btn-outline-secondary">
                    <i class="fas fa-search me-2"></i>Consultar
                </a>
            </div>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Importar datos de Excel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <input class="form-control" type="file" id="txt_archivo" accept=".xlsx, .xls">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="cargar_excel()">Cargar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
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

   async function cargar_excel(){
    let archivo = document.getElementById('txt_archivo').value;
    if (archivo.length==0) {
        return alert("Seleccione un archivo de excel");
    }
    let formData = new FormData();
    let excel = $("#txt_archivo")[0].files[0];
    formData.append('excel',excel);
    try {
        const response = await axios({
            method: 'post',
            url: `${host}/api/frmEmpl/upload`,
            data: formData,
            headers: { 'Content-Type': 'multipart/form-data' }
        });
        console.log(response);
        handleNetworkResponse(res);
    } catch (error) {
        handleNetworkError(err.response);
    }
    return false;
}


        var alertElement = document.querySelector("#success-alert");
    function hideAlert() {
    if (alertElement) { // Verifica si alertElement no es null
        alertElement.style.display = "none";
    }
}
if (alertElement) { // Verifica si alertElement no es null
    alertElement.style.display = "block";
    setTimeout(hideAlert, 3000);
}


</script>

