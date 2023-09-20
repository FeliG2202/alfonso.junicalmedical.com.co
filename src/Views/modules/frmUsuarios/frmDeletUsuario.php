<?php

use PHP\Controllers\TemplateControlador;
use PHP\Controllers\UsuarioControlador;

$usuarioControlador = new UsuarioControlador();
$request = $usuarioControlador->eliminarUsuarioControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>