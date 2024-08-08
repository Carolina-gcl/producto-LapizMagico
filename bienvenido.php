<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; background-color: yellow;" id="side">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
    <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
    <span class="fs-4">Sidebar</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="#" class="nav-link active" aria-current="page">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
        Home
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
        Dashboard
      </a>
    </li>
    <li>
      <a href="tInventario.php" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
        Tabla de inventariado
      </a>
    </li>
    <li>
      <a href="agregarP.php" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
        Agregar producto.
      </a>
    </li>
    <li>
      <a href="subirI.php" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
        Subir imagenes.
      </a>
    </li>
  </ul>
  <hr>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="miau.jpeg" alt="" width="32" height="32" class="rounded-circle me-2">
      <strong>Sobre mí.</strong>
    </a>
    <ul class="dropdown-menu text-small shadow">
      <li><a class="dropdown-item" href="#">New project...</a></li>
      <li><a class="dropdown-item" href="#">Settings</a></li>
      <li><a class="dropdown-item" href="#">Profile</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="inicioS.php">Cerrar Sesión</a></li>
    </ul>
  </div>
</div>
 
</body>
</html>