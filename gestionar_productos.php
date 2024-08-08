<?php
include_once 'Producto.php';
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio']; 
    $ruta_producto = $_POST['ruta_producto']; 

    $producto = new Producto(null, $nombre, $cantidad, $precio, $ruta_producto);
    $sql = "INSERT INTO productos (nombre, cantidad, precio, ruta_producto) VALUES ('" . $producto->getNombre() . "', '" . $producto->getCantidad() . "', '" . $producto->getPrecio() . "', '" . $producto->getRuta_producto() . "')";

    if ($miConexion->query($sql) === TRUE) {
        echo "Producto añadido correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $miConexion->error;
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar productos</title>
</head>
<body>
    <h1>Agregar productos</h1>
    <form method="POST" action="gestionar_productos.php">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" step="0.01" required><br><br>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required><br><br>

        <label for="ruta_producto">Dirección de la imagen del producto:</label>
        <input type="text" id="ruta_producto" name="ruta_producto" required><br><br>

        <button type="submit">Añadir Producto</button>
    </form>
    <h2>Lista de Productos</h2>
    <ul>
    <?php
    $resultado = $miConexion->query("SELECT * FROM productos");
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<li>" . $fila['nombre'] . " - " . $fila['cantidad'] . " - " . $fila['precio'] . " - " . $fila['ruta_producto'] . "</li>";
        }
    } else {
        echo "No hay productos.";
    }
    ?>
    </ul>
</body>
</html>
