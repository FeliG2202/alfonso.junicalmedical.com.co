<?php 

namespace PHP\Controllers;

use PHP\Controllers\MenuControlador;
use PHP\Controllers\OpcionesMenuControlador;

class NavBarControlador {
	
	public $menuControlador;
	public $opcionMenuControlador;

	function __construct(){
		$this->menuControlador = new MenuControlador();
		$this->opcionMenuControlador = new OpcionesMenuControlador();
	}


}