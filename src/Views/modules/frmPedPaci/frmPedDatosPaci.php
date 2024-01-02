<div class="col-12 col-sm-11 col-md-8 col-lg-8 mx-auto mt-5 mb-5 p-4 rounded shadow">
    <div class="row">
        <div class="col mb-3">
            <h2 class="text-center">Datos Personales</h2>
            <hr>
        </div>
    </div>

    <form method="POST">
        <div class="row">

            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="mb-3">
                    <label class="mb-2">Número de Identifición</label>
                    <input type="text" id="pedDocumento" class="form-control" readonly>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="mb-3">
                    <label class="mb-2">Nombre Completo</label>
                    <input type="text" id="pedNombre" class="form-control" readonly>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="mb-3">
                    <label class="mb-2">Torre</label>
                    <input type="text" id="pedTorre" class="form-control" readonly>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="mb-3">
                    <label class="mb-2">Cama</label>
                    <input type="text" id="pedCama" class="form-control" readonly>
                </div>
            </div>


            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a type="submit" id="enviarBtn" class="btn btn-success">Siguiente</a>
            </div>
        </div>
    </form>
</div>

<!-- ================================backend=====u============================= -->


<script type="text/javascript">
    const urlParams = new URLSearchParams(window.location.href);
    // console.log(urlParams);

    axios.get(`${host}/api/frmPedPaci/paci/${urlParams.get('idPaciente')}`)
    .then(response => {
        const datos = response.data;

        getInput('pedNombre').value = datos.pacienteNombre;
        getInput('pedDocumento').value = datos.pacienteDocumento;
        getInput('pedTorre').value = datos.pacienteTorre;
        getInput('pedCama').value = datos.pacienteCama;
    })
    .catch(error => {
        console.error('Error al obtener los datos:', error);
    });

    enviarBtn.addEventListener('click', () => {
        const url = `${host}/index.php?folder=frmPedPaci&view=frmPedMenuPaci&idPaciente=${urlParams.get('idPaciente')}`;
        window.location.href = url;
    });
</script>
