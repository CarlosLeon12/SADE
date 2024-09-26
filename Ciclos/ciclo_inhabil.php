<?php

    include('../db_connect.php');
    $consulta = "SELECT * FROM  tbl_ciclo";
    $resultado = mysqli_query($conn, $consulta);
    $data = array();

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $year = date("Y"); // Obtener el año actual

// Modificar la consulta SQL para incluir la tabla intermedia tbl_ciclo
$consulta = "
    SELECT 
    ci.codigo_ciclo,
    g.descripcion AS grado, 
    ci.seccion, 
    ci.anio,
    ma.nombre_profesor 
FROM 
    tbl_ciclo ci
LEFT JOIN 
    tbl_grados g ON ci.codigo_grado = g.codigo_grado
LEFT JOIN 
    tbl_profesores ma ON ci.codigo_profesor = ma.codigo_profesor
WHERE 
    ci.estado=0

";

// Ejecutar la consulta
$resultado = mysqli_query($conn, $consulta);

// Generar la tabla
$tabla = "
    <table class='table table-striped table-hover' style='width:100%'>
        <thead>
            <tr>
                <th>Grado</th>
                <th>Seccion</th>
                <th>Año</th>
                <th>Profesor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
";

// Añadir filas a la tabla
while ($registro = mysqli_fetch_assoc($resultado)) {
    $tabla .= "
        <tr>
            <td>{$registro['grado']}</td>
            <td>{$registro['seccion']}</td>
            <td>{$registro['anio']}</td>
            <td>{$registro['nombre_profesor']}</td>
            <td>
                <button class='btn-opcion text-primary'  title='Editar' onclick='window.location.href=\"ver.php?id={$registro['codigo_ciclo']}\"'><i class='fas fa-edit'></i></button> 
                <button class='btn-opcion text-primary'  title='Baja' onclick='window.location.href=\"habilitar_ciclo.php?id={$registro['codigo_ciclo']}\"'><i class='fas fa-check'></i></button>
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
            <h1 class="tit">Ciclo Estudiantil</h1>
            
            <div class="contenedor">
                <div class="form-group col-md-6">
                    <select class="form-control" id="anio" name="anio" required>
                        <option value="">Seleccione un Ciclo</option>
                        <?php foreach ($data as $row): ?>
                        <option value="<?php echo $row['anio']; ?>"><?php echo $row['anio']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- Botón para agregar ciclo -->
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" onclick="window.location.href='agregar_ciclo.php';">
                        Agregar Ciclo
                    </button>
            </div>
                        
            </div>

            <div class="contenedor">
                <button type="button" id="btn_buscar" class="btn-buscar">Buscar</button>
            </div>

            <div class="table-container">
                <div class="table-container">
                    <?php echo $tabla; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Incluir el archivo de JavaScript -->
    <script src="buscar_ciclos.js"></script>
</body>

</html>
