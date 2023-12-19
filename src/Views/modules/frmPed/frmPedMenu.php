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
$hora_inicio = '06:00';
$hora_fin = '10:00';

$traducciones = array('Monday' => 'Lunes', 'Tuesday' => 'Martes', 'Wednesday' => 'Miércoles', 'Thursday' => 'Jueves', 'Friday' => 'Viernes', 'Saturday' => 'Sábado', 'Sunday' => 'Domingo', 'January' => 'Enero', 'February' => 'Febrero', 'March' => 'Marzo', 'April' => 'Abril', 'May' => 'Mayo', 'June' => 'Junio', 'July' => 'Julio', 'August' => 'Agosto', 'September' => 'Septiembre', 'October' => 'Octubre', 'November' => 'Noviembre', 'December' => 'Diciembre', 'am' => 'am', 'pm' => 'pm');

$fecha_traducida = str_replace(array_keys($traducciones), array_values($traducciones), $fecha_actual);
?>

<?php if ($hora_actual >= $hora_inicio && $hora_actual <= $hora_fin) { ?>

    <div class="col-12 col-sm-12 col-md-11 col-lg-11 mx-auto my-1 p-2 rounded shadow-sm">
        <div class="container">
            <div class="d-flex justify-content-start my-2">
                <button type="button" data-bs-toggle="modal" data-bs-target="#price"class="btn btn-outline-secondary ms-auto m-1"><i class="fad fa-file-invoice-dollar"></i> Precios</button>
                <button type="button" class="btn btn-outline-secondary m-1" id="Buttonnav"><i class="fad fa-window-restore"></i> Eliminar dieta</button>
                <a class="btn btn-outline-secondary m-1" href="/inicio">Salir<i class="fas fa-sign-out-alt ms-2"></i></a>
            </div>
            <div id="registrar">
               <!-- Registrar Dietas -->
               <div class="row">
                <div class="col p-2 mb-3">
                    <h3 class="text-center">Menú de Almuerzos</h3>
                    <?php
                    echo ("<h6 class='text-center'>{$fecha_traducida}</h6>"); ?>
                </div>
                <hr>
                <div id="alertContainer"></div>
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

            <div class="row">
                <!-- Tarjeta 1 -->

                <?php
                $cont = 0;
                $cont1 = 0;
                $cont2 = 0;
                foreach ($menuPorDias['data'] as $key => $value) {
                    print '<div class="col-md-6 p-1">';
                    print '<form method="POST" action="" id="form' . $cont . '">';
                    print '<input type="hidden" name="selected-idm" value="' . $value['idNutriMenu'] . '">';
                    echo ("<input type='hidden' name='selected-idp' value='{$_GET['idPersona']}'>");
                    print '<div class="card" id="tarjeta' . $cont . '">';
                    print '<div class="card-body">';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                    echo '<h6 class="card-title">' . $value['nutriTipoNombre'] . '</h6>';
                    echo '</div>';
                    echo ("<hr>");
                    print '<div class="checkbox-group">';
                    $checkboxNames = ['nutriSopaNombre', 'nutriArrozNombre', 'nutriProteNombre', 'nutriEnergeNombre', 'nutriAcompNombre', 'nutriEnsalNombre', 'nutriBebidaNombre', 'nombreEmpaquetado'];
                    foreach ($checkboxNames as $name) {
                        if (!empty($value[$name])) {
                            print '<div class="form-check checkbox-container">';
                            echo '<input name="' . $name . '" class="form-check-input" type="checkbox" value="' . $value[$name] . '" id="flexCheckDefault' . $cont1++ . '" onclick="handleCheckboxClick(this, ' . $cont . ')">';
                            if ($name == 'nombreEmpaquetado') {
                                echo '<label class="form-check-label" for="flexCheckDefault' . $cont2++ . '" style="font-weight:bold; color:#012875;">' . $value[$name] . '</label>';
                            } else {
                                echo '<label class="form-check-label"  for="flexCheckDefault' . $cont2++ . '">' . $value[$name] . '</label>';
                            }
                            print '</div>';
                        }
                    }

                    print '</div>';
                    print '</div>';
                    echo ('<div class="mt-2 p-2">
                        <button type="button" form="form' . $cont . '" id="btnPedDatosPers' . $cont . '" name="btnPedDatosPers" class="btn btn-success w-100" disabled data-bs-toggle="modal" data-bs-target="#modal' . $cont . '">Seleccionar</button></div>');
                    print  '</div>';
                    ?>
                    <div class="modal fade" id="modalfinal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog col-lg-9">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title text-dark" id="modal1Label"><i class="fas fa-exclamation-circle me-2 fa-ls"></i>Dietas registradas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-success" role="alert">Dieta registrada correctamente</div>
                                    <h5><b>¿Desea seleccionar otra dieta?</b></h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Si</button>
                                    <a class="btn btn-secondary" href="/inicio">No</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal0" tabindex="-1" aria-labelledby="modal1Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-dark" id="modal1Label"><i class="fas fa-exclamation-circle me-2 fa-ls"></i>¿Está seguro que quiere seleccionar esta dieta?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Content for Modal 1 -->
                                </div>
                                <div class="modal-footer">
                                    <div class="row col">
                                        <div class="col col-lg-6">
                                            <div class="form-check">
                                                <input class="form-check-input" value="Descuento por nómina" type="radio" name="tipoPago" form="form0" id="Radios1" required>
                                                <label class="form-check-label" for="Radios1">
                                                    Descuento por nómina
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" value="Pago en efectivo (caja)" type="radio" name="tipoPago" form="form0" id="Radios2" required>
                                                <label class="form-check-label" for="Radios2">
                                                    Pago en efectivo (caja)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col col-lg-6">
                                            <button type="submit" form="form0" id="btnPedDatosPerso" name="btnPedDatosPerso" class="btn btn-success m-2">Guardar</button>
                                            <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="modal1Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-dark" id="modal1Label"><i class="fas fa-exclamation-circle me-2 fa-ls"></i>¿Está seguro que quiere seleccionar esta dieta?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Content for Modal 1 -->
                                </div>
                                <div class="modal-footer">
                                    <div class="row col">
                                        <div class="col col-lg-6">
                                            <div class="form-check">
                                                <input class="form-check-input" value="Descuento por nómina" type="radio" name="tipoPago" form="form1" id="Radios3" required>
                                                <label class="form-check-label" for="Radios3">
                                                    Descuento por nómina
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" value="Pago en efectivo (caja)" type="radio" name="tipoPago" form="form1" id="Radios4" required>
                                                <label class="form-check-label" for="Radios4">
                                                    Pago en efectivo (caja)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col col-lg-6">
                                            <button type="submit" form="form1" id="btnPedDatosPerso" name="btnPedDatosPerso" class="btn btn-success m-2">Guardar</button>
                                            <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    print '</form>';
                    print '</div>';
                    $cont++;
                }
                ?>


                <!-- Modal 1 -->
                <script>
                    function openModal() {
                        var myModal = new bootstrap.Modal(document.getElementById('myModal'), {});
                        myModal.show();
                    }

                    $(document).ready(function() {
                        $("button").click(function() {
                                    console.log("Button clicked"); // Check if this is logged in the console

                                    var selectedItems = [];
                                    var checkboxNames = ['nutriSopaNombre', 'nutriArrozNombre', 'nutriProteNombre', 'nutriEnergeNombre', 'nutriAcompNombre', 'nutriEnsalNombre', 'nutriBebidaNombre', 'nombreEmpaquetado'];
                                    checkboxNames.forEach(function(name) {
                                        $("input:checkbox[name=" + name + "]:checked").each(function() {
                                            if (name == 'nombreEmpaquetado') {
                                                selectedItems.push('<i class="fas fa-dot-circle me-1 fa-xs"></i><b style="color:#012875;">' + $(this).val() + '</b>');
                                            } else {
                                                selectedItems.push('<i class="fas fa-dot-circle me-1 fa-xs"></i>' + $(this).val());
                                            }
                                        });
                                    });

                                    console.log("Selected Items:", selectedItems); // Check if this is logged in the console
                                    // Add a title to the modal body
                                    $("#modal0 .modal-body").html("<h6><b>Dieta seleccionada</b></h6>");
                                    // Append the selected items to the modal body
                                    $("#modal0 .modal-body").append(selectedItems.join("<br>"));
                                    $("#modal0 .modal-body").append('<div class="alert alert-info mt-3 text-danger" role="alert"><i class="fas fa-exclamation-triangle fa-lg"></i><b> Para borrar la dieta registrada, ingrese a la opción “Eliminar” y seleccionar la dieta.</b><br><br> <i class="fas fa-exclamation-triangle fa-lg"></i><b> Al no realizar el pago o no reclamar el almuerzo se realiza el descuento por nómina.</b></div>');

                                    // Add a title to the modal body
                                    $("#modal1 .modal-body").html("<h6><b>Dieta seleccionada</b></h6>");
                                    // Append the selected items to the modal body
                                    $("#modal1 .modal-body").append(selectedItems.join("<br>"));
                                    $("#modal1 .modal-body").append('<div class="alert alert-info mt-3 text-danger" role="alert"><i class="fas fa-exclamation-triangle fa-lg"></i><b> Para borrar la dieta registrada, ingrese a la opción “Eliminar” y seleccionar la dieta.</b><br><br> <i class="fas fa-exclamation-triangle fa-lg"></i><b> Al no realizar el pago o no reclamar el almuerzo se realiza el descuento por nómina.</b></div>');
                                });
                    });


                    function showAlert(e) {
                        if (e.target.checked) {
                            alert('Entregar el recibo para reclamar la dieta en alimentos');
                        }
                    }
                    document.getElementById('Radios4').addEventListener('change', showAlert);
                    document.getElementById('Radios2').addEventListener('change', showAlert);
                </script>

            </div>
        </div>
        <div id="consultar" style="display: none;">
            <!-- Eliminar dieta -->

            <div class="mt-3">
                <!-- Boton para actualizar la tabla -->
                <div class="d-flex justify-content-between">
                    <h5>Menús registrados en el día de hoy</h5>
                    <button type="button" class="btn btn-outline-dark">
                        <i class="fas fa-repeat"></i>
                    </button>
                </div>

                <hr>
                <div id="alert-container"></div>

                <div id="carouselExampleControls" class="carousel slide" style="height: 320px;" data-ride="carousel">
                    <div id="card-container" class="carousel-inner d-flex mx-auto">

                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-secondary m-2" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <i class="fad fa-fast-backward"></i> Atras
                    </button>
                    <button class="btn btn-outline-secondary m-2" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        Siguiente <i class="fad fa-fast-forward"></i>
                    </button>
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
                            <h5 class="text-center">Esta seguro de eliminar esta dieta</h5>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" id="btn-delete-tipo-menu">
                                <i class="fas fa-file-times me-2"></i>Eliminar
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="price" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Tipos de precios en las dietas</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-light">
                            <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col">En el servicio</th>
                                <th scope="col">Para llevar</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Almuerzo completo</td>
                            <td>$ 9.500</td>
                            <td>$ 10.500</td>
                        </tr>
                        <tr>
                            <td>Bandeja</td>
                            <td>$ 8.500</td>
                            <td>$ 9.500</td>
                        </tr>
                        <tr>
                            <td>Sopa</td>
                            <td>$ 2.500</td>
                            <td>$ 3.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
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

<!-- ================================backend================================== -->

<script type="text/javascript">

    //cambio de ventana
    $(document).ready(function(){
        $("#Buttonnav").click(function(){
            $("#registrar, #consultar").toggle();
            if($("#registrar").is(":visible")){
                $("#Buttonnav").html('<i class="fad fa-window-restore"></i> Eliminar dieta');
            }else{
                $("#Buttonnav").html('<i class="fas fa-window-restore"></i> Registrar dieta');
            }
        });
    });

    const urlParams = new URLSearchParams(window.location.href);
    const idPersona = urlParams.get('idPersona');
    const id = idPersona.split('#').shift();
    console.log(id);

    document.addEventListener("DOMContentLoaded", function() {
        if (idPersona) {
            setInterval(function() {
                axios.get(`${host}/api/frmPedEdit/read/${id}`)
                .then(function(response) {
                    const alertContainer = document.querySelector('#alertContainer');

                        if (alertContainer) { // Verifica si alertContainer no es null
                            if (response.data.length > 0) {
                                const alertDiv = document.createElement('div');
                                alertDiv.className = 'alert alert-info text-dark';
                                alertDiv.role = 'alert';
                                alertDiv.innerHTML = 'Ya tiene dietas registradas el día de hoy';

                                alertContainer.innerHTML = '';
                                alertContainer.appendChild(alertDiv);
                            } else {
                                alertContainer.innerHTML = '';
                            }
                        }
                    })
                .catch(function(error) {
                    console.error('Error en la solicitud', error);
                });
            }, 3000);
        }
    });


    const myModal = new bootstrap.Modal('#modal-tipo-menus-edit', {
        keyboard: false
    });


    // HACE LA CONSULTA A LA BASE DE DATOS Y TRAE LOS DATOS DE LA API
    // Y HACE LA FUNCION "CLICK" PARA EL MODAL
    function readTipos() {
        axios.get(`${host}/api/frmPedEdit/read/${id}`)
        .then(res => {
            const cardContainer = document.getElementById('card-container');
                cardContainer.innerHTML = ''; // Clear previous content

                let contador = 1;
                const data = !res.data.status ? res.data : [];

                data.forEach((item, index) => {
                    // Crear carouselItem primero
                    const carouselItem = document.createElement('div');
                    carouselItem.classList.add('carousel-item');
                    if (index === 0) {
                        carouselItem.classList.add('active');
                    }

                    // Luego crear card
                    const card = document.createElement('div');
                    card.classList.add('card', 'col-lg-8', 'mx-auto'); // Set the column sizes

                    // Finalmente crear cardBody
                    const cardBody = document.createElement('div');
                    cardBody.classList.add('card-body');

                    const htmlString = `

                    <h6 class='card-title'>Menú Registrado No. ${contador++}</h6>
                    ${generateCardContent(item)}
                    <input type="hidden" value="${item.idMenuSeleccionado}">
                    <button type="button" class="btn btn-danger float-end" onclick="showModal(${item.idMenuSeleccionado})"><i class="fad fa-trash-alt fa-lx"></i></button>
                    `;

                    cardBody.innerHTML = htmlString;
                    card.appendChild(cardBody);
                    carouselItem.appendChild(card); // Agregar card a carouselItem
                    cardContainer.appendChild(carouselItem); // Agregar carouselItem a cardContainer
                });
            })
        .catch(error => {
            console.error("Error fetching data:", error);
        });
    }



    function generateCardContent(item) {
        const fieldsToDisplay = [
            'nutriSopaNombre', 'nutriArrozNombre', 'nutriProteNombre',
            'nutriEnergeNombre', 'nutriAcompNombre', 'nutriEnsalNombre',
            'nutriBebidaNombre', 'nombreEmpaquetado', 'tipoPago'
            ];

        let content = '';

        fieldsToDisplay.forEach(field => {
            if (item[field] !== null && item[field] !== 'null') {
                content += `<p class="card-text m-0"><i class="fas fa-dot-circle me-1 fa-xs"></i> ${item[field]}</p>`;
            }
        });

        return content;
    }

    // Primero, verifica si 'message=true' está en la URL
    if (urlParams.get('message') === 'true') {
        // Si 'message=true' está en la URL, muestra el modal
        $(document).ready(function() {
            $('#modalfinal').modal('show');
        });
    }



    function showModal(idMenuSeleccionado) {
        document.getElementById('idMenuSeleccionado').value = idMenuSeleccionado;
        myModal.show();
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
                handleNetworkResponse(res);
                readTipos();
                myModal.hide();
            }).catch(err => {
                handleNetworkError(err.response);
            });
        });
    }

    (function() {
        readTipos();
    })();

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