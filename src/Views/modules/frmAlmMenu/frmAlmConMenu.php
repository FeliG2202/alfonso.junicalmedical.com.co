<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
    TemplateControlador::redirect("index.php?view=login");
}

?>

<div class="col-12 col-sm-12 col-md-11 col-lg-11 mx-auto my-3 p-3 rounded shadow-sm">
    <div class="container">
        <div class="d-flex justify-content-start my-2">
            <button type="button" class="btn btn-outline-secondary ms-auto" id="Buttonnav"><i class="fad fa-window-restore"></i> Paciente</button>
        </div>
        <div id="empleado">
            <!-- CONSULTAR EMPLEADOS -->
            <div class="p-2">
                <h2 class="text-center"><b>Menú Empleados</b></h2>
                <hr>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                        <a href="index.php?folder=frmAlmMenu&view=frmAlmRegMenu" class="btn btn-outline-secondary">
                            <i class="fas fa-reply me-2"></i>Atrás
                        </a>

                        <button type="button" class="btn btn-outline-dark" id="btn-reload1">
                            <i class="fas fa-repeat"></i>
                        </button>
                    </div>

                    <hr>

                    <div class="table-responsive">
                        <table class="table table-hover table-sm w-100" id="table-menu1">
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
            <div class="modal fade" id="modal-menu1" tabindex="-1" aria-labelledby="modal-menuLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white" id="modal-menuLabel">Edición</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" class="form-control mb-3" id="idNutriMenu1">
                            <h5 class="text-center">Esta seguro de eliminar el menu seleccionado</h5>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" id="btn-delete-menu1">
                                <i class="fas fa-file-times me-2"></i>Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONSULTAR EMPLEADOS -->
        </div>
        <div id="paciente" style="display: none;">
           <!-- CONSULTAR PACIENTES -->
           <div class="p-2">
            <h2 class="text-center"><b>Menú Pacientes</b></h2>
            <hr>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                    <a href="index.php?folder=frmAlmMenu&view=frmAlmRegMenu" class="btn btn-outline-secondary">
                        <i class="fas fa-reply me-2"></i>Atrás
                    </a>

                    <button type="button" class="btn btn-outline-dark" id="btn-reload2">
                        <i class="fas fa-repeat"></i>
                    </button>
                </div>

                <hr>

                <div class="table-responsive">
                    <table class="table table-hover table-sm w-100" id="table-menu2">
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
        <div class="modal fade" id="modal-menu2" tabindex="-1" aria-labelledby="modal-menuLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title text-white" id="modal-menuLabel">Edición</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" class="form-control mb-3" id="idNutriMenu2">
                        <h5 class="text-center">Esta seguro de eliminar el menu seleccionado</h5>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="btn-delete-menu2">
                            <i class="fas fa-file-times me-2"></i>Eliminar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONSULTAR PACIENTES -->
    </div>
</div>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">

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

    // BACKEND DE EMPLEADOS
    const myModal1 = new bootstrap.Modal('#modal-menu1', {
        keyboard: false
    });

    // HACE LA CONSULTA A LA BASE DE DATOS Y TRAE LOS DATOS DE LA API
    // Y HACE LA FUNCION "CLICK" PARA EL MODAL
    function readTipos1() {
        axios.get(`${host}/api/frmAlmMenu/menu`).then(res => {

            new DataTable('#table-menu1', {
                data: (!res.data.status ? res.data : []),
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
                    { data: 'nutriSemanaid' }
                    ],
                createdRow: (html, row, index) => {
                    html.setAttribute("role", "button");
                    html.addEventListener("click", () => {
                        getInput("idNutriMenu1").value = row.idNutriMenu;
                        myModal1.show();
                    });
                },
            });
        });
    }

    const btn_reload1 = document.getElementById("btn-reload1");

    if (btn_reload1) {
        btn_reload1.addEventListener("click", () => {
            readTipos1();
        });
    }

    // DETERMINO LAS VARIABLE DE ELIMINAR Y ACTUALIZAR
    const btn_delete1 = document.getElementById("btn-delete-menu1");

    // // ENVIO A LA API LA FUNCION DE ELIMINAR
    if (btn_delete1) {
        btn_delete1.addEventListener("click", () => {

            const idNutriMenu1 = document.getElementById("idNutriMenu1").value;

            axios.delete(`${host}/api/frmAlmMenu/menu/${idNutriMenu1}`).then(res => {
                console.log(res)
                handleNetworkResponse(res);
                readTipos1();
                myModal1.hide();
            }).catch(err => {
                handleNetworkError(err.response);
            });
        });
    }


    (function() {
        readTipos1();
    })();
    // END BACKEND DE EMPLEADOS


    // // BACKEND DE PACIENTES
    const myModal2 = new bootstrap.Modal('#modal-menu2', {
        keyboard: false
    });

    // HACE LA CONSULTA A LA BASE DE DATOS Y TRAE LOS DATOS DE LA API
    // Y HACE LA FUNCION "CLICK" PARA EL MODAL
    function readTipos2() {
        axios.get(`${host}/api/frmAlmMenu/menuPaci`).then(res => {
            new DataTable('#table-menu2', {
                data: (!res.data.status ? res.data : []),
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
                    { data: 'nutriSemanaid' },
                    ],
                createdRow: (html, row, index) => {
                    html.setAttribute("role", "button");
                    html.addEventListener("click", () => {
                        getInput("idNutriMenu2").value = row.idNutriMenuPaci;
                        myModal2.show();
                    });
                },
            });
        });
    }

    const btn_reload2 = document.getElementById("btn-reload2");

    if (btn_reload2) {
        btn_reload2.addEventListener("click", () => {
            readTipos2();
        });
    }

    // DETERMINO LAS VARIABLE DE ELIMINAR Y ACTUALIZAR
    const btn_delete2 = document.getElementById("btn-delete-menu2");

    // ENVIO A LA API LA FUNCION DE ELIMINAR
    if (btn_delete2) {
        btn_delete2.addEventListener("click", () => {

            const idNutriMenu2 = document.getElementById("idNutriMenu2").value;

            axios.delete(`${host}/api/frmAlmMenu/menuPaci/${idNutriMenu2}`).then(res => {
                console.log(res)
                handleNetworkResponse(res);
                readTipos2();
                myModal2.hide();
            }).catch(err => {
                handleNetworkError(err.response);
            });
        });
    }


    (function() {
        readTipos2();
    })();
    // // END BACKEND DE PACIENTES
</script>
