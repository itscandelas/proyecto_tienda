<?php
include("conexion.php");

$id = $_GET['id'];

$conexion->query("DELETE FROM productos WHERE id_producto=$id");

echo "ok";
?>