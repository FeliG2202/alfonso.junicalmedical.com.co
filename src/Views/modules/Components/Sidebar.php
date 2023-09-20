<?php

use PHP\Controllers\NavBarControlador;

$navBar = new NavBarControlador();
$menus = $navBar->menuControlador->consultarMenuControlador();


$addMenu = function ($menu_nombre) {
	$replace = strtolower(str_replace(" ", "_", $menu_nombre));

	return '<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#' . $replace . '" aria-expanded="false"><div class="sb-nav-link-icon"></div>' . $menu_nombre . '<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>';
};

$addOption = function ($option) {
	$addLink = function () use ($option) {
		$folder = $option->opcionesmenu_folder;
		$view = $option->opcionMenuEnlace;
		$name = $option->opcionMenuNombre;

		if ($folder === null) {
			return "<a class='nav-link' href='index.php?view={$view}'>{$name}</a>";
		} else {
			return "<a class='nav-link' href='index.php?folder={$folder}&view={$view}'>{$name}</a>";
		}
	};

	if (isset($_SESSION['session'])) {
		if ($option->opcionMenuEstado === "online" || $option->opcionMenuEstado === "online/offline") {
			if (in_array($_SESSION['rol'], explode(",", $option->idRol))) {
				return $addLink();
			}
		}
	} elseif (!isset($_SESSION['session'])) {
		if ($option->opcionMenuEstado === "offline" || $option->opcionMenuEstado === "online/offline") {
			return $addLink();
		}
	}
};
?>

<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
	<div class="sb-sidenav-menu">
		<div class="nav">
			<?php foreach ($menus as $keyMenu => $menu) {
				if (isset($_SESSION['session'])) {
					if ($menu->menuEstado === "online" || $menu->menuEstado === "online/offline") {
						if (in_array($_SESSION['rol'], explode(",", $menu->idRol))) {
							echo($addMenu($menu->menuNombre));
						}
					}
				} elseif (!isset($_SESSION['session'])) {
					if ($menu->menuEstado === "offline" || $menu->menuEstado === "online/offline") {
						echo($addMenu($menu->menuNombre));
					}
				}

                $str = strtolower(str_replace(" ", "_", $menu->menuNombre));
				echo('<div class="collapse" id="' . $str . '" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion"><nav class="sb-sidenav-menu-nested nav">');

				$options = $navBar->opcionMenuControlador->consultarOpcionesMenuIdControlador($menu->idMenu);
				foreach ($options as $keyOpcion => $option) {
					echo($addOption($option));
				}
				echo'</nav></div>';
			} ?>
		</div>
	</div>
	<div class="sb-sidenav-footer">
		<div class="small">Logged in as:</div>
		Start Bootstrap
	</div>
</nav>
