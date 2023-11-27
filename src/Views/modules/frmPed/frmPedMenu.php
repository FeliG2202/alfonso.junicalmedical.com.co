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
<div class="col-lg-10 mx-auto mt-3 mb-3 p-3 rounded shadow-sm responsive">
    <div class="container">
        <div class="card">
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

                        <?php
                        $cont = 0;
                        $cont1 = 0;
                        $cont2 = 0;
                        foreach ($menuPorDias['data'] as $key => $value) {
                            print '<div class="col-md-6 p-2">';
                            print '<form method="POST" action="" id="form' . $cont . '">';
                            print '<input type="hidden" name="selected-idm" value="'. $value['idNutriMenu'] .'">';
                            echo ("<input type='hidden' name='selected-idp' value='{$_GET['idPersona']}'>");
                            print '<div class="card" id="tarjeta' . $cont . '">';
                            print '<div class="card-body">';
                            echo '<div class="d-flex justify-content-between align-items-center">';
                            echo '<h6 class="card-title">' . $value['nutriTipoNombre'] . '</h6>';
                            echo '</div>';
                            echo ("<hr>");
                            print '<div class="checkbox-group">';
                            $checkboxNames = ['nutriSopaNombre', 'nutriArrozNombre', 'nutriProteNombre', 'nutriEnergeNombre', 'nutriAcompNombre', 'nutriEnsalNombre', 'nutriBebidaNombre','nombreEmpaquetado'];
                            foreach ($checkboxNames as $name) {
                                if (!empty($value[$name])) {
                                 print '<div class="form-check checkbox-container">';
                                 echo '<input name="' . $name . '" class="form-check-input" type="checkbox" value="' . $value[$name] . '" id="flexCheckDefault' . $cont1++ . '" onclick="handleCheckboxClick(this, ' . $cont . ')">';
                                 echo '<label class="form-check-label" for="flexCheckDefault' . $cont2++ . '">' . $value[$name] . '</label>';
                                 print '</div>';
                             }
                         }
                         print '</div>';
                         print '</div>';
                         echo ('<div class="mt-2 p-2"><button type="submit" id="btnPedDatosPers' . $cont . '" name="btnPedDatosPers" class="btn btn-success w-100" disabled>Seleccionar</button></div>');
                         print  '</div>';
                         print '</form>';
                         print '</div>';
                         $cont++;
                     }
                     ?>


                 </div>
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
    // ya se que funciona solo que cuando queda una solo dato en la tabla no actualiza la tabla
    console.log(id);

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
