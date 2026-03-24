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
<title>Perfil</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <span class="navbar-brand">Perfil</span>

    <div>
      <a href="principal.php" class="btn btn-primary">Inicio</a>
      <a href="php/logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>
  </div>
</nav>

<div class="container mt-4">

    <div id="datosUsuario"></div>

    <h3>Historial de compras</h3>

    <table class="table">
        <thead>
            <tr>
                <th>Compra</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody id="tablaCompras"></tbody>
    </table>
</div>

<script src="js/perfil.js"></script>
</body>
</html>