<?php

session_start();
date_default_timezone_set("America/Bogota");
setlocale(LC_TIME, 'es_ES.utf8');

require_once("./vendor/autoload.php");
//define("host", "http://localhost:80");
define("host", "http://alfonso.junicalmedical.com.co");

use PHP\Controllers\TemplateControlador;
include_once("config.php");
include_once((new TemplateControlador())->cargarTemplate());
