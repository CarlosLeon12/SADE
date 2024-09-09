<?php
// Conexión a la base de datos
include('../db_connect.php');

// Modificar la consulta SQL para incluir la tabla intermedia tbl_ciclo
$consulta = "
    SELECT 
    ma.codigo_profesor, 
    ma.nombre_profesor, 
    ma.apellido_profesor,
    ma.telefono_profesor,
    TIMESTAMPDIFF(YEAR, ma.fecha_nacimiento, CURDATE()) AS edad, 
    g.descripcion AS grado, 
    ci.seccion,
    CONCAT(ma.direccion, ', ', mun.nombre_municipio, ', ', dep.nombre_departamento) AS direccion_completa 
FROM 
    tbl_profesores ma
LEFT JOIN 
    tbl_ciclo ci ON ma.codigo_profesor = ci.codigo_profesor
LEFT JOIN 
    tbl_grados g ON ci.codigo_grado = g.codigo_grado
LEFT JOIN 
    tbl_departamentos dep ON ma.codigo_departamento = dep.codigo_departamento
LEFT JOIN 
    tbl_municipios mun ON ma.codigo_municipio = mun.codigo_municipio
";

// Ejecutar la consulta
$resultado = mysqli_query($conn, $consulta);

// Generar la tabla
$tabla = "
    <table class='table table-striped table-hover' style='width:100%'>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Edad</th>
                <th>Grado</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
";

// Añadir filas a la tabla
while ($registro = mysqli_fetch_assoc($resultado)) {
    $tabla .= "
        <tr>
            <td>{$registro['codigo_profesor']}</td>
            <td>{$registro['nombre_profesor']}</td>
            <td>{$registro['apellido_profesor']}</td>
            <td>{$registro['telefono_profesor']}</td>
            <td>{$registro['edad']}</td>
            <td>{$registro['grado']}</td>
            <td>{$registro['seccion']}</td>
            <td>{$registro['direccion_completa']}</td>
            <td>
                <a href='Actualizar.php?id={$registro['codigo_profesor']}'>Editar</a> 
                <a href='ac_eliminar_empleado.php?id={$registro['codigo_profesor']}'>Eliminar</a>
            </td>
        </tr>
    ";
}

$tabla .= "</tbody></table>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SADE</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&display=swap" rel="stylesheet">
   
    <!-- FontAwesome CSS for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
<?php
    include('../menu.php')
    ?>

    <div class="content container-fluid">
        <div class="area">
            <fieldset class="complementArea">
                <div class="contenedor">
                    <div class="d-flex align-items-center">
                        <img class="imagen atimg1" src="../imagenes/usuario.png" alt="Usuario">
                        <label class="txalig" for="">Usuario</label>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="boton-salida bnt" onclick="window.location.href='../Login/index.php';">
                            <img class="imagen btsalir" src="../imagenes/salida.png" alt="Salida">
                        </button>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="area2">
            <br>
            <h1 class="tit">Maestros</h1>
            <div class="contenedor">
                <input class="form-control input-busqueda" type="text" placeholder="Buscar">
                <button class="btn-agregar" onclick="window.location.href='agregarMaestro.php';">Agregar</button>
            </div>
                <div class="table-container">
                    <?php echo $tabla; ?>
                </div>
            </div>
        </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
