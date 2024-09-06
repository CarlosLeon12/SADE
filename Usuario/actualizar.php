<?php
// Verificar datos recibidos
var_dump($_POST);

$host = 'localhost';
$dbname = 'sade';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $codigo_usuario = $_POST['id'];
    $nombre_usuario = $_POST['nombreUsu'];
    $correo_electronico = $_POST['correo'];
    $contrasena = $_POST['pass'];

    echo "Datos recibidos:<br>";
    echo "ID: $codigo_usuario<br>";
    echo "Nombre: $nombre_usuario<br>";
    echo "Correo: $correo_electronico<br>";
    echo "Contraseña: $contrasena<br>";

    // Actualizar datos en la base de datos
    $sql = "UPDATE tbl_usuarios SET nombre_usuario = :nombre_usuario, correo_electronico = :correo_electronico, contrasena = :contrasena WHERE codigo_usuario = :codigo_usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':codigo_usuario', $codigo_usuario);
    $stmt->bindParam(':nombre_usuario', $nombre_usuario);
    $stmt->bindParam(':correo_electronico', $correo_electronico);
    $stmt->bindParam(':contrasena', $contrasena);

    $stmt->execute();

    // Verificar si se actualizó alguna fila
    if ($stmt->rowCount() > 0) {
        echo "Éxito: Datos actualizados correctamente.";
    } else {
        echo "No se realizaron cambios. Verifica el ID del usuario.";
    }
} catch (PDOException $e) {
    echo "Error al actualizar: " . $e->getMessage();
}
?>
