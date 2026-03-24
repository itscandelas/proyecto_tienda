<?php
include("conexion.php");

$sql = "SELECT compras.id_compra, usuarios.nombre, compras.fecha
        FROM compras
        INNER JOIN usuarios ON compras.id_usuario = usuarios.id_usuario";

$resultado = $conexion->query($sql);

$datos = [];

while($fila = $resultado->fetch_assoc()){
    $datos[] = $fila;
}

echo json_encode($datos);
?>