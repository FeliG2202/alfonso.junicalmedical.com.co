<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once(__DIR__ . "/../vendor/autoload.php");
include_once("../config.php");
define("request", \LionRequest\Request::capture());
define("response", \LionRequest\Response::getInstance());

use LionRoute\Route;


Route::init(2);
include_once("web.php");
Route::dispatch();

