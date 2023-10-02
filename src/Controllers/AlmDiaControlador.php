<?php

namespace PHP\Controllers;

use PHP\Models\AlmDiaModelo;

class AlmDiaControlador {

	private $AlmDiaModelo;

	function __construct() {
		$this->AlmDiaModelo = new AlmDiaModelo();
	}

	public function listarAlmDiaMenuControlador() {
		return $this->AlmDiaModelo->ListarAlmDiaMenuModelo();
	}

	public function listarAlmSemanaMenuControlador() {
		return $this->AlmDiaModelo->ListarAlmSemanaMenuModelo();
	}
}
