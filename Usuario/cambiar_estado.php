<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$dbname = 'sade'; // Reemplaza con el nombre de tu base de datos
$user = 'root';         // Reemplaza con tu usuario de base de datos
$pass = '';      // Reemplaza con tu contraseña de base de datos

try {
    // Conectar a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener datos del formulario
    $codigo_usuario = $_POST['id'];
    $nuevo_estado = $_POST['estado'];

    // Actualizar estado en la base de datos
    $sql = "UPDATE tbl_usuarios SET estado = :estado WHERE codigo_usuario = :codigo_usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':codigo_usuario', $codigo_usuario);
    $stmt->bindParam(':estado', $nuevo_estado);
    $stmt->execute();

    echo "Éxito: Estado actualizado correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
