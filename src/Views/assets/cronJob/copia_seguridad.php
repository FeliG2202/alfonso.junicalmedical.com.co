<?php
$host = 'db';
$db   = 'sistema_medico';
$user = 'root';
$pass = 'lion';
$fecha = date("Ymd-His");

$dir = dirname(__FILE__) . "/backups/";
$img = $dir . $fecha . "_" . $db . ".sql";

$command = "mysqldump --opt -h $host -u $user -p $pass $db > $img";
system($command);
?>
