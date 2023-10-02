<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
    TemplateControlador::redirect("index.php?view=login");
}

?>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto my-5 p-4 rounded shadow-sm">

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
                        <!-- CONSULTAR EMPLEADOS -->
                        <div class="p-2">
                            <h2 class="text-center">Menú Empleado</h2>
                            <hr>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                    <a href="index.php?folder=frmAlmMenu&view=frmAlmRegMenu" class="btn btn-outline-secondary">
                                        <i class="fas fa-reply me-2"></i>Atrás
                                    </a>

                                    <button type="button" class="btn btn-outline-dark" id="btn-reload">
                                        <i class="fas fa-repeat"></i>
                                    </button>
                                </div>

                                <hr>

                                <div class="table-responsive">
                                    <table class="table table-hover table-sm w-100" id="table-menu">
                                        <thead>
                                            <tr>
                                                <th>Tipo Menu</th>
                                                <th>Dia</th>
                                                <th>Sopa</th>
                                                <th>Arroz</th>
                                                <th>Proteina</th>
                                                <th>Energético</th>
                                                <th>Acompañante</th>
                                                <th>Ensalada</th>
                                                <th>Bebida</th>
                                                <th>Semana</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-menu" tabindex="-1" aria-labelledby="modal-menuLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h5 class="modal-title text-white" id="modal-menuLabel">Edición</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <input type="hidden" class="form-control mb-3" id="idNutriMenu_e">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="btn-delete-menu">
                                    <i class="fas fa-file-times me-2"></i>Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONSULTAR EMPLEDOS -->

                <div class="tab-pane fade" id="Paciente" role="tabpanel">
                    <!-- Consultar Pacientes -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================================backend================================== -->


<script type="text/javascript">
    const myModal = new bootstrap.Modal('#modal-menu', {
        keyboard: false
    });

    // HACE LA CONSULTA A LA BASE DE DATOS Y TRAE LOS DATOS DE LA API
    // Y HACE LA FUNCION "CLICK" PARA EL MODAL
    function readTipos() {
        axios.get(`${host}/api/frmAlmMenu/menu`).then(res => {
            if (!res.data.status) {
                new DataTable('#table-menu', {
                    data: res.data,
                    destroy: true,
                    responsive: true,
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json",
                    },
                    columns: [
                        { data: 'nutriTipoNombre' },
                        { data: 'nutriDiasNombre' },
                        { data: 'nutriSopaNombre' },
                        { data: 'nutriArrozNombre' },
                        { data: 'nutriProteNombre' },
                        { data: 'nutriEnergeNombre' },
                        { data: 'nutriAcompNombre' },
                        { data: 'nutriEnsalNombre' },
                        { data: 'nutriBebidaNombre' },
                        { data: 'nutriSemanaNombre' },
                        ],
                    createdRow: (html, row, index) => {
                        html.setAttribute("role", "button");
                        html.addEventListener("click", () => {
                            getInput("idNutriMenu_e").value = row.idNutriMenu;
                            getInput("nutriTipoNombre_e").value = row.nutriTipoNombre;
                            getInput("nutriTipoDias_e").value = row.nutriDiasNombre;
                            myModal.show();
                        });
                    },
                });
            }
        });
    }

    const btn_reload = document.getElementById("btn-reload");

    if (btn_reload) {
        btn_reload.addEventListener("click", () => {
            readTipos();
        });
    }

    // DETERMINO LAS VARIABLE DE ELIMINAR Y ACTUALIZAR
    const btn_delete = document.getElementById("btn-delete-menu");
    const btn_update = document.getElementById("btn-update-menu");

    // // ENVIO A LA API LA FUNCION DE ELIMINAR
    // if (btn_delete) {
    //     btn_delete.addEventListener("click", () => {
    //         if (confirm("Está seguro de eleminar este menu?")) {
    //             const idNutriMenu_e = document.getElementById("idNutriMenu_e").value;

    //             axios.delete(`${host}/api/frmAlmMenu/menu/${idNutriMenu_e}`).then(res => {
    //                 console.log(res)
    //                 readTipos();
    //                 myModal.hide();
    //             }).catch(err => {

    //             });
    //         }
    //     });
    // }

    // // ENVIO  A LA API LA FUNCION DE ACTUALIZAR
    // if (btn_update) {
    //     btn_update.addEventListener("click", () => {
    //         if (confirm("Está seguro de actualizar este menu?")) {
    //             const idNutriMenu_e = getInput("idNutriMenu_e").value;
    //             const form = {
    //                 nutriTipoNombre: getInput("nutriTipoNombre_e").value
    //             };

    //             axios.put(`${host}/api/frmAlmTipo/tipo/${idNutriMenu_e}`, form)
    //             .then(res => {
    //                 console.log(res.data)
    //                 readTipos();
    //                 myModal.hide();
    //             }).catch(err => {

    //             });
    //         }
    //     });
    // }

    (function() {
        readTipos();
    })();
</script>
