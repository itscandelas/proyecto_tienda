<?php
include("conexion.php");

// Datos
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

// Imagen
$imagen = $_FILES['imagen']['name'];
$ruta = "../img/" . $imagen;

// mover imagen
move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

// guardar en BD
$sql = "INSERT INTO productos (nombre, descripcion, precio, stock, imagen)
VALUES ('$nombre', '$descripcion', $precio, $stock, '$imagen')";

$conexion->query($sql);

echo "ok";
?>