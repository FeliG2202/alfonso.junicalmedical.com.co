<?php

namespace PHP\Models;

use PDO;

class Connection
{

	public function conectar()
	{
		return new PDO("mysql:dbname=sistema_medico;host=db", 'root', 'lion', [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
	}
}
