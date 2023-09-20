<?php

use PHP\Controllers\PersonaControlador;
use PHP\Controllers\TemplateControlador;

$personaControlador = new PersonaControlador();
$request = $personaControlador->eliminarPersonaControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>