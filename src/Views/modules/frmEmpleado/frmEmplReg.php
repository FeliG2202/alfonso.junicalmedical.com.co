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
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fas fa-file-upload"></i>
          </button>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Creación masiva de usuarios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form" enctype="multipart/form-data">
          <div class="mb-3">
            <input type="file" class="form-control" id="file" name="file" accept=".xls, .xlsx">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="cargarArchivo()">Cargar Archivo</button>
      </div>
    </div>
  </div>
</div>


<!-- ================================backend================================== -->
<script type="text/javascript">

    function cargarArchivo() {
  var archivoInput = document.getElementById('file');
  var archivo = archivoInput.files[0];

  if (archivo) {
    var formData = new FormData();
    formData.append('file', archivo);

    axios.post(`${host}/api/frmEmpl/massive`, formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    }).then(function (response) {
      console.log(response.data);
    }).catch(function (error) {
      console.log(error);
    });
  } else {
    console.log('No se ha seleccionado ningún archivo.');
  }
}


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

