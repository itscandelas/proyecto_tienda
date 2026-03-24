<?php
include("conexion.php");

// DATOS
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];

// VALIDAR SI YA EXISTE
$check = $conexion->query("SELECT * FROM usuarios WHERE correo='$correo'");

if($check->num_rows > 0){
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Correo existente',
            text: 'Ya hay un usuario con ese correo'
        }).then(() => {
            window.location='../registro.html';
        });
    </script>";
    exit();
}

// 🔥 ADMIN AUTOMÁTICO
$sql_check = "SELECT * FROM usuarios";
$res = $conexion->query($sql_check);

if($res->num_rows == 0){
    $rol = 'admin'; // primer usuario
} else {
    $rol = 'usuario';
}

// INSERTAR
$sql = "INSERT INTO usuarios (nombre, correo, password, rol)
VALUES ('$nombre', '$correo', '$password', '$rol')";

if($conexion->query($sql)){
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Registro exitoso'
        }).then(() => {
            window.location='../login.html';
        });
    </script>";
} else {
    echo "Error: " . $conexion->error;
}
?>