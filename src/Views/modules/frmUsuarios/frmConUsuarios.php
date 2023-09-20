<?php

use PHP\Controllers\UsuarioControlador;

$usuarioControlador = new UsuarioControlador();
$datosusuario = $usuarioControlador->consultarUsuarioControlador();
$usuarioControlador->consultarUsuarioControlador();

?>

<!--//////////////////////////////////////////////////////-->

<h2 class="mt-4 text-center">Consultar Usuarios</h2>
<div class="card mb-4 p-4">
	<div class="card-body">
		<table class="table table-hover table-sm w-100" id="table-menu">
			<thead>
				<tr>
					<th>Nombre de usuario</th>
					<th>Estado de la usuario</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($datosusuario as $keyusuario => $valueusuario) {
					print '<tr>';
					print '<td>' . $valueusuario['usuarioLogin'] . '</td>';
					print '<td>' . $valueusuario['usuarioEstado'] . '</td>';

					print '<td>
					<a href="index.php?folder=frmUsuarios&view=frmEditUsuario&id=' . $valueusuario['idUsuario'] . '"><i class="fad fa-file-edit fa-lg text-success"></i></a>
					<a href="index.php?folder=frmUsuarios&view=frmDeletUsuario&id=' . $valueusuario['idUsuario'] . '"><i class="fad fa-file-times fa-lg text-danger"></i></a>
					</td>';
					print "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="gap-2 d-md-flex justify-content-md-end mt-2">
		<a href="index.php?folder=frmUsuarios&view=frmRegUsuario">Registrar Usuarios</a>
	</div>
</div>
