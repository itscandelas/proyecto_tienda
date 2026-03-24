<?php
$conexion = new mysqli("sql311.infinityfree.com", "if0_41462569", "24302022roman", "if0_41462569_XXX");

if($conexion->connect_error){
    die("Error de conexión: " . $conexion->connect_error);
}
?>