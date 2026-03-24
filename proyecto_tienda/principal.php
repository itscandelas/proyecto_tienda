<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.html");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Tienda</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <span class="navbar-brand">Accesorios PC</span>

    <div>
      <a href="perfil.php" class="btn btn-info">Perfil</a>
      <a href="carrito.html" class="btn btn-warning">Carrito</a>
      <a href="php/logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>
  </div>
</nav>

<div class="container mt-4">

    <!-- API -->
    <div id="api" class="alert alert-info text-center"></div>

    <h1 class="text-center">Productos</h1>
    <div class="row" id="contenedor"></div>
</div>

<script src="js/app.js"></script>
</body>
</html>