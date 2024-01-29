<?php
$host = 'db';
$db   = 'sistema_medico';
$user = 'root';
$pass = 'lion';
$fecha = date("Ymd-His");

$dir = "/var/backups/prueba/DataBase/";
$img = $dir . $fecha . "_" . $db . ".sql";

$command = "mysqldump --opt -h $host -u $user -p $pass $db > $img";
system($command);
?>
