<?php

namespace PHP\Controllers;

use PHP\Models\MenuModelo;

class MenuControlador
{

	private $menuModelo;

	function __construct()
	{
		$this->menuModelo = new MenuModelo();
	}

	public function registrarMenuControlador()
	{
		if (isset($_POST['btnRegMenu'])) {
			return !$this->menuModelo->registrarMenuModelo($_POST['nombreMenu'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmMenu&view=frmRegMenu"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmMenu&view=frmConMenu"];
		}
	}

	public function consultarMenuControlador()
	{
		return $this->menuModelo->consultarMenuModelo();
	}

	public function consultarMenuIdControlador()
	{
		if (isset($_GET['id'])) {
			return $this->menuModelo->consultarMenuIdModelo($_GET['id']);
		}
	}

	public function actualizarMenuControlador()
	{
		if (isset($_POST['updMenu'])) {
			$datosMenu = [
				'menuNombre' => $_POST['menuNombre'],
				'menuEstado' => $_POST['menuEstado'],
				'id' => $_GET['id']
			];
			return !$this->menuModelo->actualizarMenuModelo($datosMenu)
				? (object) ['request' => false, 'url' => "index.php?folder=frmMenu&view=frmEditMenu"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmMenu&view=frmConMenu"];
		}
	}

	public function eliminarMenuControlador()
	{
		if (isset($_GET['id'])) {
			return !$this->menuModelo->eliminarMenuModelo($_GET['id'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmMenu&view=frmConMenu"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmMenu&view=frmConMenu"];
		}
	}
}
