<?php
include('../db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombreUsu = $_POST['nombreUsu'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $estado = $_POST['estado'];

    if (empty($id)) {
        // Insertar nuevo usuario
        $sql = "INSERT INTO tbl_usuarios (nombre_usuario, correo_electronico, contrasena, estado) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $nombreUsu, $correo, $pass, $estado);
    } else {
        // Actualizar usuario existente
        $sql = "UPDATE tbl_usuarios SET nombre_usuario = ?, correo_electronico = ?, contrasena = ?, estado = ? WHERE codigo_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssii", $nombreUsu, $correo, $pass, $estado, $id);
    }

    if ($stmt->execute()) {
        header("Location: usu.php"); // Redirigir a la misma página
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
