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


// 0 0 * * * /usr/bin/php ~/project/Respaldo-MVC/src/Views/assets/cronJob/copia_seguridad.php

// crontab -e para editar archivo
// crontab -r para eliminar
// crontab -l para mirar el archivo