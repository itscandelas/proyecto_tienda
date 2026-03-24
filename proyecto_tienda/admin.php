<?php
session_start();

if(!isset($_SESSION['id']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.html");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <span class="navbar-brand">Panel Admin</span>

    <div>
      <a href="principal.php" class="btn btn-primary">Tienda</a>
      <a href="php/logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>
  </div>
</nav>

<div class="container mt-4">

    <h3>Agregar producto</h3>

    <form id="formProducto">
        <input type="text" id="nombre" class="form-control mb-2" placeholder="Nombre" required>
        <input type="text" id="descripcion" class="form-control mb-2" placeholder="Descripción" required>
        <input type="number" id="precio" class="form-control mb-2" placeholder="Precio" required>
        <input type="number" id="stock" class="form-control mb-2" placeholder="Stock" required>

        <!-- SELECT CON FRAGMENT -->
        <select id="categoria" class="form-control mb-2"></select>

        <input type="file" id="imagen" class="form-control mb-2" required>

        <button class="btn btn-success">Guardar</button>
    </form>

    <hr>

    <h3>Productos</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tablaProductos"></tbody>
    </table>

    <hr>

    <h3>Compras</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID Compra</th>
                <th>Usuario</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody id="tablaCompras"></tbody>
    </table>

</div>

<script src="js/admin.js"></script>
</body>
</html>