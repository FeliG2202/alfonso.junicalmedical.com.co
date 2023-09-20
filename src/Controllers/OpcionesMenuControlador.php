<?php 

namespace PHP\Controllers;

use PHP\Models\OpcionesMenuModelo;

class OpcionesMenuControlador {
	
	public $menuControlador;
	private $opcionMenuModelo;

	function __construct()	{
		$this->menuControlador = new MenuControlador();
		$this->opcionMenuModelo = new OpcionesMenuModelo();
	}


	public function registrarOpcionMenuControlador() {
		if (isset($_POST['btnregOpcionMenu'])) {
			$response = $this->opcionMenuModelo->registrarOpcionMenuModelo($_POST);

			if (!$response) {
				return (object) [
					'request' => false,
					'url' => "index.php?folder=frmMenu&view=frmRegOpcionesMenu"
				];
			}

			return (object) [
				'request' => true,
				'url' => "index.php?folder=frmMenu&view=frmRegOpcionesMenu"
			];
		}
	}

	public function consultarOpcionesMenuIdControlador($idMenu) {
		return $this->opcionMenuModelo->consultarOpcionesMenuIdModelo($idMenu);
	}

}