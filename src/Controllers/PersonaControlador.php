<?php 

namespace PHP\Controllers;

use PHP\Models\PersonaModelo;

class PersonaControlador {

	private $PersonaModelo;
	function __construct(){
		$this->PersonaModelo = new PersonaModelo();
	}
	
	public function registrarPersonaControlador() {
		if(isset($_POST['regPersona'])){
			$datosPersona = array('nombreCompleto' => $_POST['nombreCompleto'], 
				'identificacion'=>$_POST['identificacion'],
				'email' => $_POST['email'],
				'cell' => $_POST['cell']);


			return !$this->PersonaModelo->registrarPersonaModelo($datosPersona) 
			? (object) ['request' => false, 'url' => "index.php?folder=frmPersona&view=frmRegPersona"] 
			: (object) ['request' => true, 'url' => "index.php?folder=frmPersona&view=frmConPersona"];
		}
	}

	public function consultarPersonaControlador() {
		return $this->PersonaModelo->consultarPersonaModelo();
	}


	public function actualizarPersonaControlador(){
		if (isset($_POST['updPersona'])) {
			$datosPersona = array('nombreCompleto'=>$_POST['nombreCompleto'],
				'identificacion'=>$_POST['identificacion'],
				'email'=>$_POST['email'],
				'cell'=>$_POST['cell'],
				'id'=>$_GET['id']);


			return !$this->PersonaModelo->actualizarPersonaModelo($datosPersona) 
			? (object) ['request' => false, 'url' => "index.php?folder=frmPersona&view=frmEditPersona"] 
			: (object) ['request' => true, 'url' => "index.php?folder=frmPersona&view=frmConPersona"];
		}
	}

	public function eliminarPersonaControlador() {
		if (isset($_GET['id'])) {

			return !$this->PersonaModelo->eliminarPersonaModelo($_GET['id']) 
			? (object) ['request' => false, 'url' => "index.php?folder=frmPersona&view=frmConPersona"] 
			: (object) ['request' => true, 'url' => "index.php?folder=frmPersona&view=frmConPersona"];
		}
	}
}