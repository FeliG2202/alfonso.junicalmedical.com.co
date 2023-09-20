<?php

use PHP\Controllers\PersonaControlador;

$personaControlador = new PersonaControlador();
$request = $datosPersona = $personaControlador->consultarPersonaControlador();
?>

<!--//////////////////////////////////////////////////////-->

<h2 class="mt-4 text-center">Consultar Personas</h2>
<div class="card mb-4 p-4">
	<div class="card-body">
		<table class="table table-hover table-sm w-100" id="table-menu">
			<thead>
				<tr>
					<th>Nombre Completo</th>
					<th># Identificacion</th>
					<th>Correo Electronico</th>
					<th>Numero Telefonico</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($datosPersona as $keyPersona => $valuePersona) {
					print '<tr>';
					print '<td>' . $valuePersona['personaNombreCompleto'] . '</td>';
					print '<td>' . $valuePersona['personaDocumento'] . '</td>';
					print '<td>' . $valuePersona['personaCorreo'] . '</td>';
					print '<td>' . $valuePersona['personaNumberCell'] . '</td>';

					print '<td>
					<a href="index.php?folder=frmPersona&view=frmEditPersona&id=' . $valuePersona['idPersona'] . '"><i class="fad fa-file-edit fa-lg text-success"></i></a>
					<a href="index.php?folder=frmPersona&view=frmDeletPersona&id=' . $valuePersona['idPersona'] . '"><i class="fad fa-file-times fa-lg text-danger"></i></a>
					</td>';
					print "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="gap-2 d-md-flex justify-content-md-end mt-2">
		<a href="index.php?folder=frmPersona&view=frmRegPersona">Registrar personas</a>
	</div>
</div>

