<?php
use PHP\Controllers\TemplateControlador;

if (!isset($_SESSION['session'])) {
    TemplateControlador::redirect("index.php?view=login");
}
?>

<div class="row">
    <div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
        <h2 class="text-center">Registrar Proteína</h2>
        <hr>

        <div class="gap-2 d-md-flex justify-content-md-end my-2">
            <a href="index.php?folder=frmAlmProte&view=frmAlmConProte" class="btn btn-outline-secondary">
                <i class="fas fa-search me-2"></i>Consultar
            </a>
        </div>

        <form class="form" id="form-create-prote">
            <div class="row mb-3">
                <label for="" class="form-label">Nombre del Tipo de menú</label>
                <input type="text" id="nutriProteNombre" class="form-control" required>
            </div>
            <br>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" id="regAlmProte" class="btn btn-success">Registrar</button>
            </div>
        </form>
    </div>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">
    document.getElementById("form-create-prote").addEventListener("submit", (event) => {
        event.preventDefault();

        axios.post(`${host}/api/frmAlmProte/prote`, {
            nutriProteNombre: document.getElementById("nutriProteNombre").value,
            regAlmProte: document.getElementById("regAlmProte").value
        })
        .then(res => {
            // console.log(res);
            if (res.data.status === "success") {
                window.location.href = `${host}/index.php?folder=frmAlmProte&view=frmAlmConProte`;
            }
        })
        .catch(err => {
            console.log(err);
        });
    });
</script>

