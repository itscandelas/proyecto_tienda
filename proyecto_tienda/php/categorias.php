<?php
include("conexion.php");

$sql = "SELECT * FROM categorias";
$res = $conexion->query($sql);

$datos = [];

while($fila = $res->fetch_assoc()){
    $datos[] = $fila;
}

echo json_encode($datos);
?>