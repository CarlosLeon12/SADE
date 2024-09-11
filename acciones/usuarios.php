<?php
include('../db_connect.php');

$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM tbl_usuarios WHERE correo_electronico = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    
    // Verificar la contraseña cifrada
    if (password_verify($pass, $usuario['contrasena'])) {
        if ($usuario['estado'] == 1) {
            // Usuario activo
            header('Location: ../principal/lobi.php');
        } else {
            // Usuario inactivo
            header('Location: ../login/index.php?alerta=desactivado');
        }
    } else {
        // Contraseña incorrecta
        header('Location: ../login/index.php?alerta=error');
    }
} else {
    // Usuario no encontrado
    header('Location: ../login/index.php?alerta=error');
}

$stmt->close();
$conn->close();
?>
