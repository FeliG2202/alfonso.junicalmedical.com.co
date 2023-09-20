<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
    TemplateControlador::redirect("index.php?view=login");
}
?>

<div class="row">
    <div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
        <h2 class="text-center">Registrar Sopa</h2>
        <hr>

        <div class="gap-2 d-md-flex justify-content-md-end my-2">
            <a href="index.php?folder=frmAlmSopa&view=frmAlmConSopa" class="btn btn-outline-secondary">
                <i class="fas fa-search me-2"></i>Consultar
            </a>
        </div>

        <form class="form" id="form-create-sopa">
            <div class="row mb-3">
                <label for="" class="form-label">Nombre de la Sopa</label>
                <input type="text" id="nutriSopaNombre" class="form-control" required>
            </div>
            <br>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" id="regAlmSopa" class="btn btn-success">Registrar</button>
            </div>
        </form>
    </div>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">
    document.getElementById("form-create-sopa").addEventListener("submit", (event) => {
        event.preventDefault();

        axios.post(`${host}/api/frmAlmSopa/sopa`, {
            nutriSopaNombre: document.getElementById("nutriSopaNombre").value,
            regAlmSopa: document.getElementById("regAlmSopa").value
        })
        .then(res => {
            // console.log(res);
            if (res.data.status === "success") {
                window.location.href = `${host}/index.php?folder=frmAlmSopa&view=frmAlmConSopa`;
            }
        })
        .catch(err => {
            console.log(err);
        });
    });
</script>
