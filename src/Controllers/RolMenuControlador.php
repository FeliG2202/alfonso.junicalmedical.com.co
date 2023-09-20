<?php

namespace PHP\Controllers;

use PHP\Models\RolMenuModelo;

class RolMenuControlador
{

	public $rolControlador;
	public $menuControlador;
	private $rolMenuModelo;

	function __construct()
	{
		$this->rolControlador = new RolControlador();
		$this->menuControlador = new MenuControlador();
		$this->rolMenuModelo = new RolMenuModelo();
	}


	public function consultarRolMenuControlador()
	{
		return $this->rolMenuModelo->consultarRolMenuModelo();
	}


	public function consultarRolMenuIdControlador()
	{
		if (isset($_POST['idRol'])) {
			return $this->rolMenuModelo->consultarRolMenuIdModelo($_POST['idRol']);
		}
	}


	public function registrarRolMenuControlador()
	{
		if (isset($_POST['regRolMenu'])) {
			return !$this->rolMenuModelo->registrarRolMenuModelo($_POST['idMenu'], $_POST['idRol'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmMenu&view=frmRegRolMenu"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmRol&view=frmConRolUsuario"];
		}
	}
}
