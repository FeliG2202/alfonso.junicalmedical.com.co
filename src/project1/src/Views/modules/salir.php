<?php

use PHP\Controllers\TemplateControlador;

if (isset($_SESSION['session'])) {
	session_destroy();
	TemplateControlador::redirect("index.php?view=inicio");
}