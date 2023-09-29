<?php

use PHP\Controllers\PedAlmMenuPaciControlador;
use PHP\Controllers\TemplateControlador;

$PedAlmMenuPaciControlador = new PedAlmMenuPaciControlador();

$request = $PedAlmMenuPaciControlador->registrarMenuDiaControlador();
if ($request != null) {
    if ($request->request) {
        TemplateControlador::redirect($request->url);
    }
}

$menuPorDias = $PedAlmMenuPaciControlador->consultarMenuDiaControlador();

$cont = 1;
$cont1 = 0;
$cont2 = 0;
$cont3 = 1;
$fecha_actual = date("l, d F Y - H:i a");
$hora_actual = date('H:i');
$hora_inicio = '00:00';
$hora_fin = '24:00';

$traducciones = array('Monday' => 'Lunes','Tuesday' => 'Martes','Wednesday' => 'Miércoles','Thursday' => 'Jueves','Friday' => 'Viernes','Saturday' => 'Sábado','Sunday' => 'Domingo','January' => 'Enero','February' => 'Febrero','March' => 'Marzo','April' => 'Abril','May' => 'Mayo','June' => 'Junio','July' => 'Julio','August' => 'Agosto','September' => 'Septiembre','October' => 'Octubre','November' => 'Noviembre','December' => 'Diciembre','am' => 'am','pm' => 'pm');

$fecha_traducida = str_replace(array_keys($traducciones), array_values($traducciones), $fecha_actual);
?>

<div class="col-lg-10 mx-auto mt-3 mb-3 p-3 rounded shadow-sm responsive">
    <div class="container">
        <div class="card">
          <div class="card-body">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" data-toggle="tab" href="#Solicitud" role="tab" aria-selected="true">Solicitud</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#Eliminar" role="tab" aria-selected="false">Eliminar</a>
            </div>
        </nav>
        <div class="tab-content table-responsive" id="nav-tabContent">
            <!-- Registrar Dietas -->
            <div class="tab-pane fade show active" id="Solicitud" role="tabpanel">
                <?php
               if ($hora_actual >= $hora_inicio && $hora_actual <= $hora_fin) { ?>
                <div class="row">
                    <div class="col p-2 mb-3">
                        <h3 class="text-center">Menú de Almuerzos</h3>
                        <?php
                        echo ("<h6 class='text-center'>{$fecha_traducida}</h6>"); ?>
                    </div>
                    <hr>
                </div>
                <?php TemplateControlador::response(
                    $request,
                    "",
                    "Ocurrio un error, Intentelo de nuevo"
                ); ?>
                <div class="row p-1">
                    <!-- Tarjeta 1 -->

                    <?php

                    foreach ($menuPorDias['data'] as $key => $value) {
                        print '<div class="col-md-6 p-2">';
                        print '<form method="POST" action="" id="from' . $cont3++ . '">';
                        print '<input type="hidden" name="selected-idm" value="'. $value['idNutriMenuPaci'] .'">';
                        echo ("<input type='hidden' name='selected-idp' value='{$_GET['idPaciente']}'>");
                        print '<div class="card" id="tarjeta1">';
                        print '<div class="card-body">';
                        echo '<h6 class="card-title">' . $value['nutriTipoNombre'] . '</h6>';
                        echo ("<hr>");
                        /* Selecionar componentes del almuerzo */
                        print '<div class="checkbox-group">';
                        print '<div class="form-check checkbox-container">';
                        echo  '<input name="nutriSopaNombre" class="form-check-input" type="checkbox" value="' . $value['nutriSopaNombre'] . '" id="flexCheckDefault' . $cont1++ . '" onclick="handleCheckboxClick(this)">';
                        echo '<label class="form-check-label" for="flexCheckDefault' . $cont2++ . '">' . $value['nutriSopaNombre'] . '</label>';
                        print '</div>';

                        print '<div class="form-check checkbox-container">';
                        echo '<input name="nutriArrozNombre" class="form-check-input" type="checkbox" value="' . $value['nutriArrozNombre'] . '" id="flexCheckDefault' . $cont1++ . '" onclick="handleCheckboxClick(this)">';
                        echo '<label class="form-check-label" for="flexCheckDefault' . $cont2++ . '">' . $value['nutriArrozNombre'] . '</label>';
                        print '</div>';

                        print '<div class="form-check checkbox-container">';
                        echo  '<input name="nutriProteNombre" class="form-check-input" type="checkbox" value="' . $value['nutriProteNombre'] . '" id="flexCheckDefault' . $cont1++ . '" onclick="handleCheckboxClick(this)">';
                        echo '<label class="form-check-label" for="flexCheckDefault' . $cont2++ . '">' . $value['nutriProteNombre'] . '</label>';
                        print '</div>';

                        print '<div class="form-check checkbox-container">';
                        echo  '<input name="nutriEnergeNombre" class="form-check-input" type="checkbox" value="' . $value['nutriEnergeNombre'] . '" id="flexCheckDefault' . $cont1++ . '" onclick="handleCheckboxClick(this)">';
                        echo '<label class="form-check-label" for="flexCheckDefault' . $cont2++ . '">' . $value['nutriEnergeNombre'] . '</label>';
                        print '</div>';

                        print '<div class="form-check checkbox-container">';
                        echo  '<input name="nutriAcompNombre" class="form-check-input" type="checkbox" value="' . $value['nutriAcompNombre'] . '" id="flexCheckDefault' . $cont1++ . '" onclick="handleCheckboxClick(this)">';
                        echo '<label class="form-check-label" for="flexCheckDefault' . $cont2++ . '">' . $value['nutriAcompNombre'] . '</label>';
                        print '</div>';

                        print '<div class="form-check checkbox-container">';
                        echo  '<input name="nutriEnsalNombre" class="form-check-input" type="checkbox" value="' . $value['nutriEnsalNombre'] . '" id="flexCheckDefault' . $cont1++ . '" onclick="handleCheckboxClick(this)">';
                        echo '<label class="form-check-label" for="flexCheckDefault' . $cont2++ . '">' . $value['nutriEnsalNombre'] . '</label>';
                        print '</div>';

                        print '<div class="form-check checkbox-container">';
                        echo  '<input name="nutriBebidaNombre" class="form-check-input" type="checkbox" value="' . $value['nutriBebidaNombre'] . '" id="flexCheckDefault' . $cont1++ . '" onclick="handleCheckboxClick(this)">';
                        echo '<label class="form-check-label" for="flexCheckDefault' . $cont2++ . '">' . $value['nutriBebidaNombre'] . '</label>';
                        print '</div>';
                        print '</div>';
                        print '</div>';

                        echo ('<div class="mt-2 p-2"><button type="submit" id="btnPedDatosPers' . $cont++ . '" name="btnPedDatosPers" class="btn btn-success w-100">Seleccionar</button></div>');
                        print  '</div>';
                        print '</form>';
                        print '</div>';
                    }
                    ?>
                </div>

            <?php } else { ?>
                <div class="alert alert-warning">
                    <strong>Nota: </strong>El horario para solicitar el menú comienza desde las
                    <strong>8:00 AM</strong> hasta las <strong>10:00 AM</strong>
                </div>
            <?php } ?>
        </div>

        <div class="tab-pane fade" id="Eliminar" role="tabpanel">
            <?php if ($hora_actual >= $hora_inicio && $hora_actual <= $hora_fin) { ?>
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
                            <input type="hidden" class="form-control mb-3" id="idMenuSeleccionadoPaci">
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
                <div class="alert alert-warning">
                    <strong>Nota: </strong>El horario para solicitar el menú comienza desde las
                    <strong>8:00 AM</strong> hasta las <strong>10:00 AM</strong>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script>
  // Función para habilitar o deshabilitar el botón de envío
  function actualizarEstadoBoton1() {
    var checkboxes1 = document.querySelectorAll('#from1 input[type="checkbox"]');
    var enviarButton1 = document.getElementById('btnPedDatosPers1');

    // Verifica si al menos un checkbox está seleccionado
    var alMenosUnoSeleccionado1 = Array.from(checkboxes1).some(function(checkbox1) {
      return checkbox1.checked;
    });

    // Habilita o deshabilita el botón de envío según si se selecciona al menos uno
    if (alMenosUnoSeleccionado1) {
      enviarButton1.removeAttribute('disabled');
    } else {
      enviarButton1.setAttribute('disabled', 'disabled');
    }
  }

  // Agrega un evento de cambio a cada checkbox
  var checkboxes1 = document.querySelectorAll('#from1 input[type="checkbox"]');
  checkboxes1.forEach(function(checkbox1) {
    checkbox1.addEventListener('change', actualizarEstadoBoton1);
  });

  // Ejecuta la función inicialmente cuando la página se carga
  document.addEventListener('DOMContentLoaded', actualizarEstadoBoton1);
</script>

<script>
  // Función para habilitar o deshabilitar el botón de envío
  function actualizarEstadoBoton2() {
    var checkboxes2 = document.querySelectorAll('#from2 input[type="checkbox"]');
    var enviarButton2 = document.getElementById('btnPedDatosPers2');

    // Verifica si al menos un checkbox está seleccionado
    var alMenosUnoSeleccionado2 = Array.from(checkboxes2).some(function(checkbox2) {
      return checkbox2.checked;
    });

    // Habilita o deshabilita el botón de envío según si se selecciona al menos uno
    if (alMenosUnoSeleccionado2) {
      enviarButton2.removeAttribute('disabled');
    } else {
      enviarButton2.setAttribute('disabled', 'disabled');
    }
  }

  // Agrega un evento de cambio a cada checkbox
  var checkboxes2 = document.querySelectorAll('#from2 input[type="checkbox"]');
  checkboxes2.forEach(function(checkbox2) {
    checkbox2.addEventListener('change', actualizarEstadoBoton2);
  });

  // Ejecuta la función inicialmente cuando la página se carga
  document.addEventListener('DOMContentLoaded', actualizarEstadoBoton2);
</script>

<!-- ================================backend================================== -->


<script type="text/javascript">
    const urlParams = new URLSearchParams(window.location.href);
    const idPaciente = urlParams.get('idPaciente');
    const id = idPaciente.split('#').shift();
    // ya se que funciona solo que cuando queda una solo dato en la tabla no actualiza la tabla
    console.log(id);

    const myModal = new bootstrap.Modal('#modal-tipo-menus-edit', {
        keyboard: false
    });


    // HACE LA CONSULTA A LA BASE DE DATOS Y TRAE LOS DATOS DE LA API
    // Y HACE LA FUNCION "CLICK" PARA EL MODAL
    function readTipos() {
        axios.get(`${host}/api/frmPedPaci/read/${id}`).then(res => {
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
                    ],
                createdRow: (html, row, index) => {
                    html.setAttribute("role", "button");
                    html.addEventListener("click", () => {
                        document.getElementById("idMenuSeleccionadoPaci").value = row.idMenuSeleccionadoPaci;
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
            const idMenuSeleccionadoPaci = document.getElementById("idMenuSeleccionadoPaci").value;
            axios.delete(`${host}/api/frmPedPaci/delete/${idMenuSeleccionadoPaci}`).then(res => {
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
</script>

