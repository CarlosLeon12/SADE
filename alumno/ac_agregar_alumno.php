<?php
    $dpi = !empty($_POST['dpi']) ? $_POST['dpi'] : '';
    $nombre_padre = !empty($_POST['nombre-padre']) ? $_POST['nombre-padre'] : '';
    $apellido_padre = !empty($_POST['apellido-padre']) ? $_POST['apellido-padre'] : '';
    $parentezco = !empty($_POST['parentesco']) ? $_POST['parentesco'] : '';
    $telefono = !empty($_POST['telefono']) ? $_POST['telefono'] : '';

    $cui = !empty($_POST['cui']) ? $_POST['cui'] : '';
    $nombre = !empty($_POST['nombres']) ? $_POST['nombres'] : '';
    $apellido = !empty($_POST['apellidos']) ? $_POST['apellidos'] : '';
    $fecha_nacimiento = !empty($_POST['fecha-nacimiento']) ? $_POST['fecha-nacimiento'] : '';
    $direccion = !empty($_POST['direccion']) ? $_POST['direccion'] : '';
    $departamento = !empty($_POST['departamento']) ? $_POST['departamento'] : '';
    $municipio = !empty($_POST['municipio']) ? $_POST['municipio'] : '';

    echo "Fecha de nacimiento recibida: '" . $fecha_nacimiento . "'<br>";
   

    if ($nombre && $apellido && $cui && $dpi && $fecha_nacimiento && $parentezco && $nombre_padre && $apellido_padre && $direccion && $telefono && $departamento && $municipio) {
        include('../db_connect.php');
        
        // Iniciar una transacción
        $conn->begin_transaction();

        try {
            // 1. Llamar al procedimiento almacenado para insertar en tbl_responsables
            echo "fecha segue siendo: '". $fecha_nacimiento . "' <br>";
            $consulta_responsable = "CALL InsertarResponsable(?, ?, ?, ?, ?)";
            $stmt_responsable = $conn->prepare($consulta_responsable);
            $stmt_responsable->bind_param("sssis", $dpi, $nombre_padre, $apellido_padre, $parentezco, $telefono);

            if ($stmt_responsable->execute()) {
                $stmt_responsable->close();
                
                // Obtener el último ID insertado
                $result = $conn->query("SELECT LAST_INSERT_ID() as codigo_responsable");
                if ($result) {
                    $row = $result->fetch_assoc();
                    $codigo_responsable = $row['codigo_responsable'];
                    $result->free();
                } else {
                    throw new Exception('No se pudo obtener el código del responsable');
                }

                echo "Código responsable insertado: $codigo_responsable<br>";

                // 2. Llamar al procedimiento almacenado para insertar en tbl_alumnos
                echo "fecha segue siendo: '". $fecha_nacimiento . "' <br>";
                $consulta_alumno = "CALL InsertarAlumno(?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt_alumno = $conn->prepare($consulta_alumno);
                $stmt_alumno->bind_param("ssssssii", $cui, $nombre, $apellido, $fecha_nacimiento, $codigo_responsable, $direccion, $departamento, $municipio);
                echo "fecha segue siendo: '". $fecha_nacimiento . "' <br>";
                if ($stmt_alumno->execute()) {
                    echo 'Registro guardado correctamente';
                    $stmt_alumno->close();
                } else {
                    throw new Exception('Error al Guardar Alumno: ' . $stmt_alumno->error);
                }
                
                // Confirmar la transacción
                $conn->commit();
            } else {
                throw new Exception('Error al Guardar Responsable: ' . $stmt_responsable->error);
            }
        } catch (Exception $e) {
            // Revertir la transacción en caso de error
            $conn->rollback();
            echo 'Error: ' . $e->getMessage();
        } finally {
            $conn->close();
        }
    } else {
        echo 'Datos incompletos. Verifique todos los campos.';
        
    }

    header('Location: registro.php')
?>
