<?php

use PHP\Controllers\MenuControlador;

$menuControlador = new MenuControlador();
$request = $menuControlador->eliminarMenuControlador();
$datosMenu = $menuControlador->consultarMenuControlador();

if (isset($request)) { ?>
	<script type="text/javascript">
		window.location.href = "<?php echo (!$request[0] ? $request[1] : $request[1]); ?>";
	</script>
<?php } ?>

<!--//////////////////////////////////////////////////////-->

<h2 class="mt-4 text-center">Consultar Menú Principal</h2>
<div class="card mb-4 p-4">
	<div class="card-body">
		<table class="table table-hover table-sm w-100" id="table-menu">
			<thead>
				<tr>
					<th>Nombre del Perfi</th>
					<th>Estado del Perfil</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($datosMenu as $keyRol => $valueRol) {
					if ($valueRol['menuEstado'] == 'true') {
						$estadoMenu = "Activo";
					} else {
						$estadoMenu = "Inactivo";
					}
					print '<tr>';
					print '<td>' . $valueRol['menuNombre'] . '</td>';
					print '<td>' . $estadoMenu . '</td>';
					print '<td>
					<a href="index.php?folder=frmMenu&view=frmEditMenu&id=' . $valueRol['idMenu'] . '"><i class="fad fa-file-edit fa-lg text-success"></i></a>
					<a href="index.php?folder=frmMenu&view=frmDeletMenu=' . $valueRol['idMenu'] . '"><i class="fad fa-file-times fa-lg text-danger"></i></a>
					</td>';
					print "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
		<a href="index.php?folder=frmMenu&view=frmRegMenu">Registrar Menu Principal</a>
	</div>
</div>

