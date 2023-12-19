<div class="col-12 col-sm-12 col-md-11 col-lg-11 mx-auto my-3 p-3 rounded shadow-sm">
    <div class="container">
        <div class="d-flex justify-content-start my-2">
            <button type="button" class="btn btn-outline-secondary ms-auto" id="Buttonnav"><i class="fad fa-window-restore"></i> Paciente</button>
        </div>
        <div id="empleado">
            <div class="p-2">
                <h2 class="text-center"><b>Consolidado de Dietas Empleados</b></h2>
                <hr>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo">
                            <i class="fal fa-file-spreadsheet"></i>
                        </button>
                    </div>

                    <hr>

                    <div class="table-responsive">
                        <table class="table table-hover table-sm w-100" id="table-menu1" >
                            <thead>
                                <tr>
                                    <th>Identificacion</th>
                                    <th>Nombre completo</th>
                                    <th>Sopa</th>
                                    <th>Arroz</th>
                                    <th>Proteina</th>
                                    <th>Energetico</th>
                                    <th>Acompañante</th>
                                    <th>Ensalada</th>
                                    <th>Tipo de Pago</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- Formulario de Generador de Reporte -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title text-white" id="exampleModalLabel1">Reporte de Relacion de Solicitudes</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form method="POST" id="form-report-dates1">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Desde:</label>
                                    <input type="date" class="form-control" id="date_start1" onchange="validarFechas()" required>
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Hasta:</label>
                                    <input type="date" class="form-control" id="date_end1" onchange="validarFechas()" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-download me-2"></i>Generar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="paciente" style="display: none;">
            <div class="p-2">
                <h2 class="text-center"><b>Consolidado de Dietas Paciente</b></h2>
                <hr>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@mdo">
                            <i class="fal fa-file-spreadsheet"></i>
                        </button>
                    </div>

                    <hr>

                    <div class="table-responsive">
                        <table class="table table-hover table-sm w-100" id="table-menu2" >
                            <thead>
                                <tr>
                                    <th>Identificacion</th>
                                    <th>Nombre completo</th>
                                    <th>Sopa</th>
                                    <th>Arroz</th>
                                    <th>Proteina</th>
                                    <th>Energetico</th>
                                    <th>Acompañante</th>
                                    <th>Ensalada</th>
                                    <th>Bebida</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- Formulario de Generador de Reporte -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title text-white" id="exampleModalLabel2">Reporte de Relacion de Solicitudes</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form method="POST" id="form-report-dates2">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Desde:</label>
                                    <input type="date" class="form-control" id="date_start2" onchange="validarFechas()" required>
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Hasta:</label>
                                    <input type="date" class="form-control" id="date_end2" onchange="validarFechas()" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-download me-2"></i>Generar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
// ================================backend Empleados================================== //
    //cambio de ventana
    $(document).ready(function(){
        $("#Buttonnav").click(function(){
            $("#empleado, #paciente").toggle();
            if($("#empleado").is(":visible")){
                $("#Buttonnav").html('<i class="fad fa-window-restore"></i> Paciente');
            }else{
                $("#Buttonnav").html('<i class="fas fa-window-restore"></i> Empleado');
            }
        });
    });

    (function eadTipos() {
        axios.get(`${host}/api/frmPed/read`).then(res => {
            new DataTable('#table-menu1', {
                data: (!res.data.status ? res.data : []),
                destroy: true,
                responsive: true,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json",
                },
                columns: [
                    { data: 'personaDocumento' },
                    { data: 'personaNombreCompleto' },
                    { data: 'nutriSopaNombre' },
                    { data: 'nutriArrozNombre' },
                    { data: 'nutriProteNombre' },
                    { data: 'nutriEnergeNombre' },
                    { data: 'nutriAcompNombre' },
                    { data: 'nutriEnsalNombre' },
                    { data: 'tipoPago' },
                    { data: 'fecha_actual' }
                    ],
            });
        });
    })();

    document.getElementById("form-report-dates1").addEventListener("submit", (event) => {
        event.preventDefault();

        const form = new FormData();
        form.append("date_start", document.getElementById("date_start1").value);
        form.append("date_end",  document.getElementById("date_end1").value);

        axios.post(`${host}/api/frmPed/put`, form, {
            headers: {
                "Content-Type": "multipart/form-data"
            },
            responseType: "blob"
        }).then(res => {
            if (res.status === 204) {
                alert("No hay datos en el sistema");
            } else {
                const link = document.createElement("a");
                link.href = window.URL.createObjectURL(new Blob([res.data]));
                link.setAttribute("download",`Reporte-Empleados-${dayjs().format("YYYY-MM-DD")}.xlsx`);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }).catch(err => {
            alert("Ocurrió un error al generar el reporte");
        });
    });
// ================================End backend Empleados================================== //

// ================================backend Paciente================================== //
    (function eadTipos() {
        axios.get(`${host}/api/frmPed/readPaci`).then(res => {
            new DataTable('#table-menu2', {
                data: (!res.data.status ? res.data : []),
                destroy: true,
                responsive: true,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json",
                },
                columns: [
                    { data: 'pacienteDocumento' },
                    { data: 'pacienteNombre' },
                    { data: 'nutriSopaNombre' },
                    { data: 'nutriArrozNombre' },
                    { data: 'nutriProteNombre' },
                    { data: 'nutriEnergeNombre' },
                    { data: 'nutriAcompNombre' },
                    { data: 'nutriEnsalNombre' },
                    { data: 'nutriBebidaNombre' },
                    { data: 'fecha_actual' }
                    ],
            });
        });
    })();

    document.getElementById("form-report-dates2").addEventListener("submit", (event) => {
        event.preventDefault();

        const form = new FormData();
        form.append("date_start", document.getElementById("date_start2").value);
        form.append("date_end",  document.getElementById("date_end2").value);

        axios.post(`${host}/api/frmPed/putPaci`, form, {
            headers: {
                "Content-Type": "multipart/form-data"
            },
            responseType: "blob"
        }).then(res => {
            if (res.status === 204) {
                alert("No hay datos en el sistema");
            } else {
                const link = document.createElement("a");
                link.href = window.URL.createObjectURL(new Blob([res.data]));
                link.setAttribute("download",`Reporte-Pacientes-${dayjs().format("YYYY-MM-DD")}.xlsx`);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }).catch(err => {
            alert("Ocurrió un error al generar el reporte");
        });
    });
// ================================End backend Paciente================================== //
</script>
