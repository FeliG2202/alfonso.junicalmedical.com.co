<div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto my-5 rounded shadow-sm">

    <div class="container">
        <div class="card">
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#Empleado" role="tab" aria-selected="true">Empleado</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#Paciente" role="tab" aria-selected="false">Paciente</a>
                    </div>
                </nav>

                <div class="tab-content " id="nav-tabContent">
                    <div class="tab-pane fade show active" id="Empleado" role="tabpanel">
                         <div class="p-2">
                            <h2 class="text-center">Relación de Solicitudes</h2>
                            <hr>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                                        <i class="fal fa-file-spreadsheet"></i>
                                    </button>
                                </div>

                                <hr>

                                <div class="table-responsive">
                                    <table class="table table-hover table-sm w-100" id="table-menu" >
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
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-success">
                                        <h5 class="modal-title text-white" id="exampleModalLabel">Reporte de Relacion de Solicitudes</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form method="POST" id="form-report-dates">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Desde:</label>
                                                <input type="date" class="form-control" id="date_start" onchange="validarFechas()" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Hasta:</label>
                                                <input type="date" class="form-control" id="date_end" onchange="validarFechas()" required>
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

                    <div class="tab-pane fade" id="Paciente" role="tabpanel">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
// ================================backend Empleados================================== //
    (function eadTipos() {
        axios.get(`${host}/api/frmPed/read`).then(res => {
            new DataTable('#table-menu', {
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
                    { data: 'nutriBebidaNombre' },
                    { data: 'fecha_actual' }
                    ],
            });
        });
    })();

    document.getElementById("form-report-dates").addEventListener("submit", (event) => {
        event.preventDefault();

        const form = new FormData();
        form.append("date_start", document.getElementById("date_start").value);
        form.append("date_end",  document.getElementById("date_end").value);

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
                link.setAttribute("download",`reporte-${dayjs().format("YYYY-MM-DD")}.xlsx`);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }).catch(err => {
            alert("Ocurrió un error al generar el reporte");
        });
    });
// ================================End backend Empleados================================== //

// ================================backend Empleados================================== //
    (function eadTipos() {
        axios.get(`${host}/api/frmPed/frmConPedMenu/leer-menu`).then(res => {
            new DataTable('#table-menu', {
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
                    { data: 'nutriBebidaNombre' },
                    { data: 'fecha_actual' }
                    ],
            });
        });
    })();

    document.getElementById("form-report-dates").addEventListener("submit", (event) => {
        event.preventDefault();

        const form = new FormData();
        form.append("date_start", document.getElementById("date_start").value);
        form.append("date_end",  document.getElementById("date_end").value);

        axios.post(`${host}/api/reporte/almuerzos`, form, {
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
                link.setAttribute("download",`reporte-${dayjs().format("YYYY-MM-DD")}.xlsx`);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }).catch(err => {
            alert("Ocurrió un error al generar el reporte");
        });
    });
// ================================End backend Empleados================================== //
</script>
