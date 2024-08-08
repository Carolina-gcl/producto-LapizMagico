<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cargar Productos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="mibody">
<style>
    #mibody {
        background-color: #e3f2fd;
    }
    #titulo {
        color: #0d47a1;
        font-size: 45px;
    }
    #contenedor {
        margin: 20px;
        font-size: 25px;
    }
    .button-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 25px;
    }
    .left-buttons {
        display: flex;
        gap: 10px;
    }
    #botonderecho {
        margin-left: auto;
    }
</style>
</head>
<body id="mibody">
    <div class="container" id="contenedor">
        <h1 class="my-4" id="titulo">Agrega tus productos</h1>
        <form id="productoForm">
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad existente del producto:</label>
                <input type="number" id="cantidad" name="cantidad" step="0.01" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ruta_producto">Dirección de la imagen del producto:</label>
                <input type="text" id="ruta_producto" name="ruta_producto" class="form-control" required>
            </div>
            <div class="button-container">
                <div class="left-buttons">
                    <button type="submit" class="btn btn-success">Añadir Producto</button>
                    <a href="borrarP.php">
                        <button type="button" class="btn btn-danger" id="boton">Borrar producto</button>
                    </a>
                </div>
                <a href="bienvenido.php">
                    <button type="button" class="btn btn-outline-info" id="botonderecho">Regresar al inicio</button>
                </a>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('productoForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const nombre = document.getElementById('nombre').value;
            const cantidad = document.getElementById('cantidad').value;
            const precio = document.getElementById('precio').value;
            const ruta_producto = document.getElementById('ruta_producto').value;

            fetch('gestionar_productos.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `nombre=${nombre}&cantidad=${cantidad}&precio=${precio}&ruta_producto=${ruta_producto}`
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                cargarProductos();
                document.getElementById('productoForm').reset();
            });
        });

        function cargarProductos() {
            // Aquí puedes añadir lógica para recargar la lista de productos si es necesario
        }
    </script>
</body>
</html>
