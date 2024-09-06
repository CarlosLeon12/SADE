<?php
include('../db_connect.php'); // Asegúrate de que la ruta es correcta

// Obtener los datos del formulario
$nombreUsu = $_POST['nombreUsu'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$estado = 1; // Establece un valor predeterminado para el estado, o ajusta según sea necesario

// Prepara y ejecuta la consulta de inserción
$sql = "INSERT INTO tbl_usuarios (nombre_usuario, correo_electronico, contrasena, estado) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssi', $nombreUsu, $correo, $pass, $estado);

if ($stmt->execute()) {
    echo "Nuevo usuario guardado con éxito.";
} else {
    echo "Error: " . $stmt->error;
}

// Cierra la conexión
$stmt->close();
$conn->close();
?>
