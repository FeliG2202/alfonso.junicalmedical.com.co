<?php

use PHP\Controllers\TemplateControlador;
use PHP\Controllers\UsuarioControlador;

$request = (new UsuarioControlador())->validateSession();

if ($request != null) {
  if ($request->request) {
    TemplateControlador::redirect($request->url);
  }
}
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-5 mb-2">
      <div class="card shadow-lg border-0 rounded-lg mt-4">
        <div class="card-header w-100 text-center mb-3"><img src="<?php echo(host); ?>/src/Views/assets/img/logo1.png" class="img-fluid w-60 h-25"></div>
        <div class="card-body">
          <?php if ($request != null) {
            if (!$request->request) {
              echo(TemplateControlador::error($request->message));
            }
          } ?>
          <form method="POST">
            <div class="form-floating mb-3">
              <input class="form-control" name="login" id="inputEmail" type="text" required autocomplete="off">
              <label for="inputEmail">Usuario</label>
            </div>
            <div class="form-floating mb-3">
              <input class="form-control" name="password" id="inputPassword" type="password" />
              <label for="inputPassword">Contraseña</label>
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" id="showPasswordSwitch">
              <label class="form-check-label" for="showPasswordSwitch">Mostrar Contraseña</label>
            </div>
            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
              <button type="submit" name="regLogin" class="btn btn-success">Ingresar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("inputPassword");
    const showPasswordSwitch = document.getElementById("showPasswordSwitch");

    showPasswordSwitch.addEventListener("change", function () {
      if (showPasswordSwitch.checked) {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    });
  });
</script>
