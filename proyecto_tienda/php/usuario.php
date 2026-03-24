<?php
session_start();
include("conexion.php");

$id = $_SESSION['id'];

$sql = "SELECT nombre, correo FROM usuarios WHERE id_usuario=$id";
$resultado = $conexion->query($sql);

echo json_encode($resultado->fetch_assoc());
?>