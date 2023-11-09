<?php 

namespace PHP\Controllers;

use PHP\Models\TemplateModelo;

class TemplateControlador {
	////CARGAR EL TEMPLATE EN EL INDEX /////
	function cargarTemplate(): string {
		return "src/Views/template.php";
	}

	////CARGAR LAS PAGINAS AL TEMPLATE////
	public function cargarPaginaAlTemplate(): string {
		return (new TemplateModelo())->validarEnlacesModelo(
			isset($_GET['folder']) ? "{$_GET['folder']}/" : '',
			isset($_GET['view']) ? "{$_GET['view']}.php" : 'inicio.php'
		);
	}

	public static function redirect(string $url): void {
		echo('<script type="text/javascript">window.location.href = "' . $url . '";</script>');
	}

	public static function error(string $response): void {
		echo("<div class='alert alert-danger' role='alert'>{$response}</div>");
	}

	public static function success(string $response): void {
		echo("<div class='alert alert-success' role='alert'>{$response}</div>");
	}

	public static function response(?object $request, string $success, string $error): void {
		if ($request != null) {
			!$request->request ? self::error($error) : self::success($success);
		}
	}

}