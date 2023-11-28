<?php

use PHP\Controllers\PedAlmMenuControlador;
use PHP\Controllers\TemplateControlador;

$PedAlmMenuControlador = new PedAlmMenuControlador();

$request = $PedAlmMenuControlador->registrarMenuDiaControlador();
if ($request != null) {
    if ($request->request) {
        TemplateControlador::redirect($request->url);
    }
}

$menuPorDias = $PedAlmMenuControlador->consultarMenuDiaControlador();

$cont = 1;
$cont1 = 0;
$cont2 = 0;
$cont3 = 1;
$fecha_actual = date("l, d F Y - H:i a");
$hora_actual = date('H:i');
$hora_inicio = '07:00';
$hora_fin = '24:00';

$traducciones = array('Monday' => 'Lunes','Tuesday' => 'Martes','Wednesday' => 'Miércoles','Thursday' => 'Jueves','Friday' => 'Viernes','Saturday' => 'Sábado','Sunday' => 'Domingo','January' => 'Enero','February' => 'Febrero','March' => 'Marzo','April' => 'Abril','May' => 'Mayo','June' => 'Junio','July' => 'Julio','August' => 'Agosto','September' => 'Septiembre','October' => 'Octubre','November' => 'Noviembre','December' => 'Diciembre','am' => 'am','pm' => 'pm');

$fecha_traducida = str_replace(array_keys($traducciones), array_values($traducciones), $fecha_actual);
?>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-dark" id="modal-tipo-menus-editLabel"><i class="fas fa-exclamation-circle me-2 fa-lg"></i>Se encontraron menus registrados.</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <a href="/inicio" class="btn btn-success" role="button">Inicio</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<div class="col-12 col-sm-12 col-md-12 col-lg-10 mx-auto my-5 rounded shadow-sm">
    <div class="container">
        <div class="card ">
         <?php if ($hora_actual >= $hora_inicio && $hora_actual <= $hora_fin) { ?>
          <div class="card-body">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-solicitud-tab" data-bs-toggle="tab" href="#Solicitud" role="tab" aria-selected="true">Solicitud</a>
                    <a class="nav-item nav-link" id="nav-eliminar-tab" data-bs-toggle="tab" href="#Eliminar" role="tab" aria-selected="false">Eliminar</a>
                    <a class="nav-item nav-link" id="nav-salir-tab" href="/inicio" role="tab" aria-selected="false">Salir<i class="fas fa-sign-out-alt ms-2"></i></a>
                </div>
            </nav>

            <div class="tab-content table-responsive" id="nav-tabContent">
                <!-- Registrar Dietas -->
                <div class="tab-pane fade show active" id="Solicitud" role="tabpanel">

                    <div class="row">
                        <div class="col p-2 mb-3">
                            <h3 class="text-center">Menú de Almuerzos</h3>
                            <?php
                            echo ("<h6 class='text-center'>{$fecha_traducida}</h6>"); ?>
                        </div>
                        <hr>
                    </div>
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
                    <?php }
                    ?>

                    <div class="row p-1">
    <!-- Tarjeta 1 -->
    <div id="cardsContainer"></div>
</div>

<script>
    axios.get('your_api_endpoint')
    .then(function (response) {
        let cont = 0;
        let cont1 = 0;
        let cont2 = 0;
        let cardsContainer = document.getElementById('cardsContainer');
        response.data.forEach(function(value) {
            let card = document.createElement('div');
            card.className = 'col-md-6 p-2';
            card.innerHTML = `
                <form method="POST" action="" id="form${cont}">
                    <input type="hidden" name="selected-idm" value="${value.idNutriMenu}">
                    <input type='hidden' name='selected-idp' value="${value.idPersona}">
                    <div class="card" id="tarjeta${cont}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="card-title">${value.nutriTipoNombre}</h6>
                            </div>
                            <hr>
                            <div class="checkbox-group">
                                ${value.checkboxNames.map(name => {
                                    if (value[name]) {
                                        return `
                                            <div class="form-check checkbox-container">
                                                <input name="${name}" class="form-check-input" type="checkbox" value="${value[name]}" id="flexCheckDefault${cont1++}" onclick="handleCheckboxClick(this, ${cont})">
                                                <label class="form-check-label" for="flexCheckDefault${cont2++}">${value[name]}</label>
                                            </div>
                                        `;
                                    }
                                }).join('')}
                            </div>
                        </div>
                        <div class="mt-2 p-2">
                            <button type="submit" id="btnPedDatosPers${cont}" name="btnPedDatosPers" class="btn btn-success w-100" disabled>Seleccionar</button>
                        </div>
                    </div>
                </form>
            `;
            cardsContainer.appendChild(card);
            cont++;
        });
    })
    .catch(function (error) {
        console.log(error);
    });
</script>

             </div>
             <div class="tab-pane fade" id="Eliminar" role="tabpanel">
                <!-- Eliminar dieta -->
                <div class="card mb-4">
                    <div class="card-body">
                        <!-- Boton para actualizar la tabla -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                            <button type="button" class="btn btn-outline-dark" id="btn-reload">
                                <i class="fas fa-repeat"></i>
                            </button>
                        </div>

                        <hr>

                        <!-- tabla para mostrar datos -->
                        <div class="table-responsive">
                            <table class="table table-hover table-sm w-100" id="table-menu">
                                <thead>
                                    <tr>
                                        <th>Sopa</th>
                                        <th>Arroz</th>
                                        <th>Proteina</th>
                                        <th>Energético</th>
                                        <th>Acompañante</th>
                                        <th>Ensalada</th>
                                        <th>Bebida</th>
                                        <th>Solicitud</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Modal donde se confirma la eliminacion -->
                <div class="modal fade" id="modal-tipo-menus-edit" tabindex="-1" aria-labelledby="modal-tipo-menus-editLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-white" id="modal-tipo-menus-editLabel">Eliminar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <input type="hidden" class="form-control mb-3" id="idMenuSeleccionado">
                                <h5 class="text-center">Esta seguro de eliminar la dieta selecionada</h5>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="btn-delete-tipo-menu">
                                    <i class="fas fa-file-times me-2"></i>Eliminar
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="p-4">
                    <div class="alert alert-warning p-3">
                        <strong>Nota: </strong>El horario para solicitar el menú comienza desde las
                        <strong>7:00 AM</strong> hasta las <strong>10:00 AM</strong>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- ================================backend================================== -->


<script type="text/javascript">

    const urlParams = new URLSearchParams(window.location.href);
    const idPersona = urlParams.get('idPersona');
    const id = idPersona.split('#').shift();
    console.log(id);

    document.addEventListener("DOMContentLoaded", function () {
        if (idPersona) {
        // Realiza la consulta cuando el documento esté listo
            axios.get(`${host}/api/frmPedEdit/read/${id}`)
            .then(function (response) {
                // Verifica si la respuesta contiene datos
                if (response.data.length > 0) {
                    // Abre la ventana modal si hay datos
                    $('#myModal').modal('show');

                    // Actualiza el contenido del cuerpo del modal con los datos
                    const modalBody = document.querySelector('.modal-body');
                    modalBody.innerHTML = ''; // Borra el contenido existente

                    // Contador
                    let contador = 0;

                    // Suponiendo que response.data es un array de objetos
                    response.data.forEach(item => {
                        // Incrementa el contador
                        contador++;

                        // Agrega un título al modal con el contador
                        modalBody.innerHTML += `<p class="modal-title mt-3">Dieta registrada #${contador}</p>`;

                        // Itera sobre las propiedades del objeto
                        Object.keys(item).forEach(key => {
                            // Verifica si el valor no es null y no es la propiedad 'idMenuSeleccionado'
                            if (item[key] !== null && key !== 'idMenuSeleccionado') {
                                modalBody.innerHTML += `<p class="mb-0"><i class="fas fa-dot-circle me-1 fa-xs"></i>${item[key]}</p>`;
                            }
                        });
                    });
                }
            })
            .catch(function (error) {
                console.error('Error en la solicitud', error);
            });
        }
    });


    const myModal = new bootstrap.Modal('#modal-tipo-menus-edit', {
        keyboard: false
    });


    // HACE LA CONSULTA A LA BASE DE DATOS Y TRAE LOS DATOS DE LA API
    // Y HACE LA FUNCION "CLICK" PARA EL MODAL
    function readTipos() {
        axios.get(`${host}/api/frmPedEdit/read/${id}`).then(res => {
            new DataTable('#table-menu', {
                data: (!res.data.status ? res.data : []),
                destroy: true,
                responsive: true,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json",
                },
                columns: [
                    { data: 'nutriSopaNombre' },
                    { data: 'nutriArrozNombre' },
                    { data: 'nutriProteNombre' },
                    { data: 'nutriEnergeNombre' },
                    { data: 'nutriAcompNombre' },
                    { data: 'nutriEnsalNombre' },
                    { data: 'nutriBebidaNombre' },
                    { data: 'nombreEmpaquetado' },
                    ],
                createdRow: (html, row, index) => {
                    html.setAttribute("role", "button");
                    html.addEventListener("click", () => {
                        document.getElementById("idMenuSeleccionado").value = row.idMenuSeleccionado;
                        myModal.show();
                    });
                },
            });

        });
    }

    const btn_reload = document.getElementById("btn-reload");

    if (btn_reload) {
        btn_reload.addEventListener("click", () => {
            readTipos();
        });
    }

    // DETERMINO LAS VARIABLE DE ELIMINAR Y ACTUALIZAR
    const btn_delete = document.getElementById("btn-delete-tipo-menu");

    // ENVIO A LA API LA FUNCION DE ELIMINAR
    if (btn_delete) {
        btn_delete.addEventListener("click", () => {
            const idMenuSeleccionado = document.getElementById("idMenuSeleccionado").value;
            axios.delete(`${host}/api/frmPedEdit/delete/${idMenuSeleccionado}`).then(res => {
                //console.log(res)
                readTipos();
                myModal.hide();
            }).catch(err => {
            });
        });
    }

    (function() {
        readTipos();
    })();

    var alertElement = document.querySelector("#success-alert");
    function hideAlert() {
        alertElement.style.display = "none";
    }
    alertElement.style.display = "block";
    setTimeout(hideAlert, 3000);
</script>
