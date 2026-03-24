<?php
session_start();
include("conexion.php");

$data = json_decode(file_get_contents("php://input"), true);

$id_usuario = $_SESSION['id'];

// insertar compra
$sql = "INSERT INTO compras (id_usuario, fecha) VALUES ($id_usuario, NOW())";
$conexion->query($sql);

$id_compra = $conexion->insert_id;

// insertar detalle
foreach($data as $producto){

    $id_producto = $producto['id'];
    $cantidad = $producto['cantidad'];
    $subtotal = $producto['precio'] * $cantidad;

    $sql_detalle = "INSERT INTO detalle_compra (id_compra, id_producto, cantidad, subtotal)
                    VALUES ($id_compra, $id_producto, $cantidad, $subtotal)";

    $conexion->query($sql_detalle);
}

echo "ok";
?>