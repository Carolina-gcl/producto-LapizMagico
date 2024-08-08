<?php
$host = 'localhost';
$db = 'lapiz_magico';
$user = 'AdmiPapeleria';
$pass = '';
$miConexion = new mysqli($host, $user, $pass, $db);
if ($miConexion->connect_error) {
 die("Conexión fallida: " . $conexion->connect_error);
}
?>
