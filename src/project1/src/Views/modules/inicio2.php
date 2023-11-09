<?php
use PHP\Controllers\TemplateControlador;

if(!isset($_SESSION['id'])){
	TemplateControlador::redirect("index.php?view=login");
}

?>

  <div class="col-lg-7 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
    <div class="jumbotron text-center">
      <h1 class="display-4 fw-bold">¡Bienvenido!</h1>
      <p class="lead">Has iniciado sesión exitosamente.</p>
      <hr class="my-4">
      <p>Disfruta de tu experiencia en nuestro sitio.</p>
    </div>
  </div>
