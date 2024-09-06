<?php
// Conexión a la base de datos
$servername = "localhost"; // Cambiar a tu configuración
$username = "root";
$password = "";
$dbname = "sade"; // Cambiar a tu configuración

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos desde el fetch
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$estado = $data['estado'];

// Actualizar el estado del usuario en la base de datos
$sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $estado, $id);

if ($stmt->execute()) {
    echo "Estado actualizado correctamente";
} else {
    echo "Error al actualizar el estado: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
