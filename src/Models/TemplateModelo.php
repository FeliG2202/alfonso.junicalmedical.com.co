<?php

namespace PHP\Models;

class TemplateModelo
{

	public function validarEnlacesModelo($folder, $view)
	{
		$cmp = "src/Views/modules/";

		if (!file_exists($cmp . $folder . $view)) {
			return $cmp . '404.php';
		} else {
			return $cmp . $folder . $view;
		}
	}
}
