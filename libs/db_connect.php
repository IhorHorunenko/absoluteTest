<?php 
$server = 'localhost';
$name = 'admin';
$pass = 'admin';

$dsn = 'mysql: host='.$server.'; dbname=absolutetest; sharset=utf8;';
$pdo = new PDO($dsn, $name, $pass);
?>