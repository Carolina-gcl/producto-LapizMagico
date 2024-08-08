<?php
// PHP para consultar productos desde la base de datos
$host = 'localhost';
$user = 'AdmiPapeleria';
$pass = '';
$db = 'lapiz_magico';

// Crear conexión
$miConexion = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($miConexion->connect_error) {
    die("Conexión fallida: " . $miConexion->connect_error);
}

// Consultar productos
$sql = "SELECT id, nombre, precio FROM productos";
$resultado = $miConexion->query($sql);

$productos = [];
if ($resultado->num_rows > 0) {
    while ($producto = $resultado->fetch_assoc()) {
        $productos[] = $producto;
    }
}

// Cerrar conexión
$miConexion->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <main id="productos" class="col-sm-8 row">
                <!-- Los productos se generarán dinámicamente desde PHP -->
                <?php foreach ($productos as $producto): ?>
                    <div class="card col-sm-4">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($producto['nombre']) ?></h5>
                            <p class="card-text">$<?= htmlspecialchars($producto['precio']) ?></p>
                            <button onclick="agregarCarro(<?= $producto['id'] ?>, '<?= addslashes($producto['nombre']) ?>', <?= $producto['precio'] ?>, 1)" class="btn btn-success">+</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </main>
            <aside class="col-sm-4">
                <h2>Carrito</h2>
                <ul id="carrito" class="list-group"></ul>
                <hr>
                <p>Total: $ <span id="total">0.00</span></p>
            </aside>
        </div>
    </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="ventas.js"></script>
</body>
</html>
