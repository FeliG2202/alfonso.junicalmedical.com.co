<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
    TemplateControlador::redirect("index.php?view=login");
}
?>

<div class="row">
    <div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
        <h2 class="text-center">Energético</h2>
        <hr>

        <div class="gap-2 d-md-flex justify-content-md-end my-2">
            <a href="/frmAlmEnerge/frmAlmConEnerge" class="btn btn-outline-secondary">
                <i class="fas fa-search me-2"></i>Consultar
            </a>
        </div>

        <form class="form" id="form-create-energe">
            <div class="row mb-3">
                <label for="" class="form-label">Descripción</label>
                <input type="text" id="nutriEnergeNombre" class="form-control" required>
            </div>
            <br>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" id="regAlmEnerge" class="btn btn-success">Registrar</button>
            </div>
        </form>
    </div>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">
    document.getElementById("form-create-energe").addEventListener("submit", (event) => {
        event.preventDefault();

        axios.post(`${host}/api/frmAlmEnerge/energe`, {
            nutriEnergeNombre: document.getElementById("nutriEnergeNombre").value,
            regAlmEnerge: document.getElementById("regAlmEnerge").value
        })
        .then(res => {
            // console.log(res);
            if (res.data.status === "success") {
                window.location.href = `${host}/index.php?folder=frmAlmEnerge&view=frmAlmConEnerge`;
            }
        })
        .catch(err => {
            console.log(err);
        });
    });
</script>