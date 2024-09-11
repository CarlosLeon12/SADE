<?php
include('../db_connect.php');

// Consultar los usuarios
$sql = "SELECT * FROM tbl_usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $rowClass = $row['estado'] == 0 ? 'inactive-row' : '';
        // Mostrar asteriscos en lugar de la contraseña
        $password_hidden = str_repeat('*', 10); // Mostrar 10 asteriscos
        echo "<tr class='$rowClass' data-id='{$row['codigo_usuario']}'>
                <td>{$row['codigo_usuario']}</td>
                <td>{$row['nombre_usuario']}</td>
                <td>{$row['correo_electronico']}</td>
                <td>$password_hidden</td>
                <td>" . ($row['estado'] == 1 ? 'Activo' : 'Inactivo') . "</td>
                <td><button class='btn-edit btn btn-primary'>Editar</button></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No se encontraron usuarios.</td></tr>";
}

$conn->close();
?>
