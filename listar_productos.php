<?php
include 'conexion.php';
$resultado = $miConexion->query("SELECT * FROM productos");
$productos = array();
while ($fila = $resultado->fetch_assoc()) {
 $productos[] = $fila;
}
echo json_encode($productos);
?>