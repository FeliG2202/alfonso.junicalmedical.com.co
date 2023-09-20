<?php

namespace PHP\Controllers;

use PHP\Models\RolUsuarioModelo;

class RolUsuarioControlador
{

	private $rolUsuarioModelo;
	public $usuarioControlador;
	public $rolControlador;

	function __construct()
	{
		$this->rolUsuarioModelo = new RolUsuarioModelo();
		$this->usuarioControlador = new UsuarioControlador();
		$this->rolControlador = new RolControlador();
	}

	public function registrarRolUsuarioControlador()
	{
		if (isset($_POST['regRolUsuario'])) {
			if (isset($_POST['idRoles']) && isset($_POST['idUsuario'])) {
				for ($i = 0; $i < count($_POST['idRoles']); $i++) {
					$datoRolUsuario = $this->consultarRolUsuarioIdRolControlador($_POST['idRoles'][$i], $_POST['idUsuario']);
					if ($datoRolUsuario != null) {
						if ($datoRolUsuario[0]['usuarioRolEstado'] == 'false') {
							$respuesta = $this->actualizarEstadoRolUsuarioIdControlador($datoRolUsuario[0]['idUsuarioRol'], 'true');
						}
					} else {
						$idRolUsuarioInsertar[] = $_POST['idRoles'][$i];
					}
				}
				if (isset($idRolUsuarioInsertar)) {
					$respuesta = $this->rolUsuarioModelo->registrarRolUsuarioModelo($_POST['idUsuario'], $idRolUsuarioInsertar);
					if ($respuesta) {
						header('location:index.php?action=ok10');
					} else {
						header('location:index.php?action=fa10');
					}
				}
			} else {
				header('location:index.php?action=fa10');
			}
		}
	}

	public function consultarRolesUsuariosIdUsuarioControlador() {
		if (isset($_SESSION['idUsuario'])) {
			$rolUsuarioModelo = new RolUsuarioModelo();
			$datos = $rolUsuarioModelo->consultarUsuarioIdRolesModelo($_SESSION['idUsuario']);
			return $datos;
		}
	}

	public function cargarInicioRolControlador() {

		if (isset($_POST['idRol']) && $_POST['idRol'] > 0) {
			$_SESSION['idRol'] = $_POST['idRol'];
			header("location:Home");
		}
	}

	public function consultarRolesUsuarioIdUsuarioControlador($idUsuario) {
		return $this->rolUsuarioModelo->consultarRolesUsuarioIdUsuarioModelo($idUsuario);
	}

	public function consultarRolUsuarioIdRolControlador($idRol, $idUsuario) {
		return $this->rolUsuarioModelo->consultarRolUsuarioIdRolModelo($idRol, $idUsuario);
	}


	public function actualizarEstadoRolUsuarioIdControlador($idUsuarioRol, $estado) {
		return $this->rolUsuarioModelo->actualizarEstadoRolUsuarioIdModelo($idUsuarioRol, $estado);
	}

	public function cambiarEstadoRolUsuarioControlador($idUsuario, $estado) {
		return $this->rolUsuarioModelo->cambiarEstadoRolUsuarioModelo($idUsuario, $estado);
	}

	public function actualizarRolUsuarioControlador() {
		if (isset($_POST['updRolUsuario'])) {
			if (isset($_POST['idRolUsuario'])) {
				// $request = $this->cambiarEstadoRolUsuarioControlador($_GET['id'], 'false');
				if (count($_POST['idRolUsuario']) > 0) {
					for ($i = 0; $i < count($_POST['idRolUsuario']); $i++) {
						$request = $this->actualizarEstadoRolUsuarioIdControlador($_POST['idRolUsuario'][$i], 'true');
						if (!$request) break;
					}
				}
				return !$request
					? (object) ['request' => false, 'url' => "index.php?folder=frmRol&view=frmEditRolUsuario"]
					: (object) ['request' => true, 'url' => "index.php?folder=frmRol&view=frmConRolUsuario"];
			}
		}
	}
}
