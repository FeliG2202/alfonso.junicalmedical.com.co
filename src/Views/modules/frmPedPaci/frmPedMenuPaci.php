<?php

use PHP\Controllers\PedAlmMenuControlador;

$PedAlmMenuControlador = new PedAlmMenuControlador();
$menuPorDias = $PedAlmMenuControlador->consultarMenuDiaControlador();
?>

<div class="col-lg-8 mx-auto mt-5 mb-5 p-4 rounded shadow-sm">
    <?php
    $fecha_actual = date("l, d F Y - H:i a");
    $hora_actual = date('H:i');
    $hora_inicio = '07:00';
    $hora_fin = '23:00';
    ?>

    <?php if ($hora_actual >= $hora_inicio && $hora_actual <= $hora_fin) { ?>
        <div class="row">
            <div class="col mb-3">
                <h2 class="text-center">Menú del Día</h2>
                <h6 class='text-center'><?php echo $fecha_actual?></h6>
                <hr>
            </div>
        </div>

        <div class="row mt-4" id="container-card-food"></div>
    <?php } else { ?>
        <div class="alert alert-warning">
            <strong>Nota: </strong>El horario para solicitar el menú comienza desde las
            <strong>8:00 AM</strong> hasta las <strong>10:00 AM</strong>
        </div>
    <?php } ?>
</div>

<script type="text/javascript">
    axios.get(`${host}/api/frmPedPaci/paci`)
    .then(({ data }) => {
        data.data.forEach(item => {
            addCardFood({
                id: 'container-card-food',
                title: item.nutriTipoNombre,
                row: {
                    nutriSopaNombre: item.nutriSopaNombre,
                    nutriArrozNombre: item.nutriArrozNombre,
                    nutriProteNombre: item.nutriProteNombre,
                    nutriEnergeNombre: item.nutriEnergeNombre,
                    nutriAcompNombre: item.nutriAcompNombre,
                    nutriEnsalNombre: item.nutriEnsalNombre,
                    nutriBebidaNombre: item.nutriBebidaNombre,
                },
                callback_function: () => {
                    const items = [];
                    fields.forEach(field => field.checked && items.push(field.value));

                    if (items.length === 0) {
                        alert('Debe seleccionar un tipo de comida');
                        return false;
                    }

                    const formD = getFormData({
                        selected_list: items
                    });

                    axios.post(`${host}/api/frmPedPaci/paciMenu`, formD, headerMultipartFormData())
                    .then(({ data }) => {
                        console.log(data);
                    }).catch(({ response }) => {
                        console.log(response);
                    });
                }
            });
        });
    })
</script>