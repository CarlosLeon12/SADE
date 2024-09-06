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
    $nombre_usuario = $_POST['nombreUsu'];
    $correo_electronico = $_POST['correo'];
    $contrasena = $_POST['pass'];

    // Actualizar datos en la base de datos
    $sql = "UPDATE tbl_usuarios SET nombre_usuario = :nombre_usuario, correo_electronico = :correo_electronico, contrasena = :contrasena WHERE codigo_usuario = :codigo_usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':codigo_usuario', $codigo_usuario);
    $stmt->bindParam(':nombre_usuario', $nombre_usuario);
    $stmt->bindParam(':correo_electronico', $correo_electronico);
    $stmt->bindParam(':contrasena', $contrasena);
    $stmt->execute();

    echo "Éxito: Datos actualizados correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
