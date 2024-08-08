<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Conexión a la base de datos
    $miConexion = new mysqli("localhost", "AdmiPapeleria", "", "lapiz_magico");
    if ($miConexion->connect_errno) {
        echo "Fallo al conectar con MySQL: " . $miConexion->connect_error;
        exit();
    }

    // Escapar los datos del usuario para evitar inyecciones SQL
    $username = $miConexion->real_escape_string($username);
    $password = md5($miConexion->real_escape_string($password)); // Encriptar la contraseña

    // Consulta SQL para verificar el usuario
    $resultado = $miConexion->query("SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'");
    if ($resultado->num_rows > 0) {
        $_SESSION['username'] = $username;

        // Verificar si el usuario ha marcado "Recordar nombre de usuario"
        if (isset($_POST['remember'])) {
            // Creamos una cookie para recordar el nombre de usuario por 30 días
            setcookie('remember_username', $username, time() + (30 * 24 * 3600), '/');
        }

        header('Location: bienvenido.php');
        exit();
    } else {
        $error = "Nombre de usuario o contraseña incorrectos";
    }

    // Cerrar conexión
    $miConexion->close();
}
?>
<!doctype html>
<html lang="es" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de sesión</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #my-body {
            background-color: #F5F5DC; /* Tu color beige claro */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column; /* Asegura que los elementos hijos se apilen verticalmente */
        }
        #link-container {
            margin: 20px; /* Añade un margen alrededor del div */
            font-size: 17px; /* Aumenta el tamaño del texto del enlace */
            text-align: center; /* Centra el texto */
        }
        #recuadro {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 370px; /* Ajusta la anchura */
            margin-top: 15px;
            display: flex;
            flex-direction: column; /* Asegura que los elementos hijos se apilen verticalmente */
            align-items: center; /* Centra los elementos hijos */
        }
        .form-floating {
            width: 100%; /* Asegura que los campos de entrada ocupen el ancho completo */
            margin-bottom: 15px;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
    </style>
</head>
<body id="my-body">

<div id="recuadro">
    <img class="mb-4" src="images-removebg-preview.png" alt="" width="335" height="75">
    <h1 class="h3 mb-3 fw-normal">Por favor, inicia sesión para comenzar.</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST" action="inicioS.php">
        <div class="form-floating">
            <input type="text" class="form-control" name="username" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Escribe tu nombre de usuario</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Introduce tu contraseña</label>
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" name="remember" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                ¿Recordar nombre de usuario?
            </label>
        </div>
        <button type="submit" class="btn btn-danger w-100 py-2">Iniciar sesión</button>
    </form>
</div>
<div id="link-container">
    <a href="registro.php">Registrarme</a>
</div>
<p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
