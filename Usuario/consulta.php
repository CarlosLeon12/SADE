<?php
include('../db_connect.php'); // Asegúrate de que la ruta es correcta

// Consulta para obtener los datos de la tabla
$sql = "SELECT codigo_usuario AS id, nombre_usuario AS nombre, correo_electronico AS correo, contrasena, estado FROM tbl_usuarios";
$result = $conn->query($sql);

$usuarios = array();

if ($result->num_rows > 0) {
    // Recorre los resultados y los añade al array
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

// Devuelve los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($usuarios);

// Cierra la conexión
$conn->close();
?>
