<?php
session_start();
include("conexion.php");

$correo = $_POST['correo'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE correo='$correo' AND password='$password'";
$res = $conexion->query($sql);

if($res->num_rows > 0){
    $user = $res->fetch_assoc();

    $_SESSION['id'] = $user['id_usuario'];
    $_SESSION['rol'] = $user['rol'];

    if($user['rol'] == 'admin'){
        header("Location: ../admin.html");
    } else {
        header("Location: ../principal.html");
    }

} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Datos incorrectos'
        }).then(() => {
            window.location='../login.html';
        });
    </script>";
}
?>