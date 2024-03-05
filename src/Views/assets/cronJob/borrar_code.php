<?php
$host = 'db';
$db   = 'sistema_medico';
$user = 'root';
$pass = 'lion';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

$sql = "UPDATE personas SET personasCodigo = NULL, personaDate = NULL WHERE TIMESTAMPDIFF(MINUTE, personaDate, NOW()) > 5";
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>
