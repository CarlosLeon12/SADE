<?php
include('../db_connect.php');

$email = $_GET['email'];
$pass = $_GET['password'];

// Prepara la consulta SQL para evitar inyecciones de SQL
$sql = "SELECT * FROM tbl_usuarios WHERE correo_electronico=? AND contrasena=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $email, $pass);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
    if ($usuario['estado'] == 1) {
        // Usuario activo
        header('Location: ../principal/lobi.php');
    } else {
        // Usuario inactivo
        header('Location: ../login/index.php?alerta=desactivado');
    }
} else {
    // Credenciales incorrectas
    header('Location: ../login/index.php?alerta=error');
}

$stmt->close();
$conn->close();
?>
