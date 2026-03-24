<?php
session_start();
include("conexion.php");

$id = $_SESSION['id'];

$sql = "SELECT compras.id_compra, productos.nombre AS producto,
        detalle_compra.cantidad, detalle_compra.subtotal, compras.fecha
        FROM compras
        INNER JOIN detalle_compra ON compras.id_compra = detalle_compra.id_compra
        INNER JOIN productos ON detalle_compra.id_producto = productos.id_producto
        WHERE compras.id_usuario = $id";

$resultado = $conexion->query($sql);

$datos = [];

while($fila = $resultado->fetch_assoc()){
    $datos[] = $fila;
}

echo json_encode($datos);
?>