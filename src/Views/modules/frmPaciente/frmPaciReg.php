<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
    TemplateControlador::redirect("index.php?view=login");
}

?>
<div class="row">
    <div class="col-lg-8 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
        <h2 class="text-center"><b>Pacientes</b></h2>
        <hr>
        <div id="alert-container"></div>

        <div class="d-flex justify-content-between my-2">
            <div>
                <a href="<?php echo(host); ?>/src/Views/assets/excel/paciente_registro.xlsx" class="btn btn-primary ms-2">
                    <i class="fad fa-download"></i>
                </a>
            </div>
            <div class="gap-2 d-md-flex">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fad fa-file-upload"></i>
                </button>
                <a href="/frmPaciente/frmPaciCon" class="btn btn-outline-secondary">
                    <i class="fas fa-search me-2"></i>Consultar
                </a>
            </div>
        </div>


        <form class="form" id="form-create-empl">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="pacienteDocumento" class="form-label">Número de Identificación</label>
                        <input type="number" name="pacienteDocumento" id="pacienteDocumento" class="form-control" required>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="pacienteNombre" class="form-label">Nombre y Apellido</label>
                        <input type="text" name="pacienteNombre" id="pacienteNombre" class="form-control" required>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                  <div class="mb-3">
                    <label for="pacienteTorre" class="form-label">Torre</label>
                    <select class="form-select" name="pacienteTorre" id="pacienteTorre"  aria-label="Default select example" required>
                        <option selected>Seleccione</option>
                        <option value="Torre 1">Torre 1</option>
                        <option value="Torre 2">Torre 2</option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="mb-3">
                    <label for="pacienteCama" class="form-label">Cama</label>
                    <input type="text" name="pacienteCama" id="pacienteCama" class="form-control" required>
                </div>
            </div>
        </div>

        <br>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" id="btnPaci" class="btn btn-success">Registrar</button>
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
                <button type="button" class="btn btn-primary" onclick="cargar_excel(); $('#exampleModal').modal('hide');">Cargar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-info" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInfoLabel">Informe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content will be dynamically added here using JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

        axios.post(`${host}/api/frmPaci/create`, {
            pacienteDocumento: getInput("pacienteDocumento").value,
            pacienteNombre: getInput("pacienteNombre").value,
            pacienteTorre: getInput("pacienteTorre").value,
            pacienteCama: getInput("pacienteCama").value,
            btnPaci: getInput("btnPaci").value
        })
        .then(res => {
            if (res.data.status === "success") {
                window.location.href = `${host}/index.php?folder=frmPaciente&view=frmPaciCon`;
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
                url: `${host}/api/frmPaci/upload`,
                data: formData,
                headers: { 'Content-Type': 'multipart/form-data' }
            });
            console.log(response);
            handleServerResponse(response);
        } catch (error) {
            console.log(error.response);
            handleServerResponse(response);
        }
    }

       // Function to handle server response
function handleServerResponse(response) {
    const { savedData, notSavedData } = response.data;

    // Selecciona el cuerpo del modal de información
    const modalInfoBody = document.querySelector('#modal-info .modal-body');

    // Limpia el contenido existente en el cuerpo del modal de información
    modalInfoBody.innerHTML = '';

    // Añade los datos guardados al cuerpo del modal de información
    savedData.forEach(data => {
        if (data.pacienteNombre && data.pacienteDocumento && data.pacienteTorre && data.pacienteCama) {
            const p1 = document.createElement('p');
            p1.textContent = "Paciente guardado:";
            p1.style.color = "green";
            p1.style.marginBottom = "0"; // Reduce el margen inferior
            modalInfoBody.appendChild(p1);

            const p2 = document.createElement('p');
            p2.textContent = "Datos ingresados: " + data.pacienteNombre + ", " + data.pacienteDocumento + ", " + data.pacienteTorre + ", " + data.pacienteCama;
            p2.style.marginTop = "0"; // Reduce el margen superior
            modalInfoBody.appendChild(p2);
        }
    });

    // Añade los datos no guardados al cuerpo del modal de información
    notSavedData.forEach(data => {
        if (data.pacienteNombre || data.pacienteDocumento || data.pacienteTorre || data.pacienteCama) {
            const p = document.createElement('p');
            let missingFields = [];
            if (!data.pacienteNombre) missingFields.push("nombre");
            if (!data.pacienteDocumento) missingFields.push("documento");
            if (!data.pacienteTorre) missingFields.push("torre");
            if (!data.pacienteCama) missingFields.push("cama");
            if (missingFields.length > 0) {
                const p1 = document.createElement('p');
                p1.textContent = "Paciente no guardado por falta de " + missingFields.join(", ");
                p1.style.color = "red";
                p1.style.marginBottom = "0"; // Reduce el margen inferior
                modalInfoBody.appendChild(p1);

                const p2 = document.createElement('p');
                p2.textContent = "Datos ingresados: " + data.pacienteNombre + ", " + data.pacienteDocumento + ", " + data.pacienteTorre + ", " + data.pacienteCama;
                p2.style.marginTop = "0"; // Reduce el margen superior
                modalInfoBody.appendChild(p2);
            } else {
                const p1 = document.createElement('p');
                p1.textContent = "Paciente Duplicado: ";
                p1.style.color = "red";
                p1.style.marginBottom = "0"; // Reduce el margen inferior
                modalInfoBody.appendChild(p1);

                const p2 = document.createElement('p');
                p2.textContent = "Datos ingresados: " + data.pacienteNombre + ", " + data.pacienteDocumento + ", " + data.pacienteTorre + ", " + data.pacienteCama;
                p2.style.marginTop = "0"; // Reduce el margen superior
                modalInfoBody.appendChild(p2);
            }
            modalInfoBody.appendChild(p);
        }
    });

    // Muestra el modal de información
    new bootstrap.Modal(document.getElementById('modal-info')).show();
}


</script>

