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
            <h1 class="tit">Asistencia Alumnos</h1>
            
            <div class="contenedor">
            <div class="form-group col-md-6">
                            <select class="form-control" id="grado" name="grado" required>
                                <option value="">Seleccione un Grado</option>
                                <option value="1">Primero</option>
                                <option value="2">Segundo</option>
                                <option value="3">Tercero</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                        <select class="form-control" id="grado" name="grado" required>
                                <option value="">Seleccionar Seccion</option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                            </select>
                        </div>
            </div>

            <div class="contenedor">
            <button type="submit" class="btn-buscar">Buscar</button>
            </div>


            <div class="table-container">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>CUI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Edad</th>
                            <th>Promedio</th>
                            <th>Grado</th>
                            <th>Seccion</th>
                            <th>Asistencia</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
// Simulación de datos (Elimina esto cuando conectes con tu base de datos)
$alumnos = [
    ['id' => 1, 'codigo' => '119020', 'nombre' => 'Jesus', 'apellido' => 'Corton', 'edad' => 10, 'promedio' => 83, 'grado' => 'Primero', 'seccion' => 'A'],
    ['id' => 2, 'codigo' => '119021', 'nombre' => 'Maria', 'apellido' => 'Lopez', 'edad' => 11, 'promedio' => 87, 'grado' => 'Segundo', 'seccion' => 'A'],
    // Agrega más datos aquí
];

foreach ($alumnos as $alumno) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($alumno['id']) . '</td>';
    echo '<td>' . htmlspecialchars($alumno['codigo']) . '</td>';
    echo '<td>' . htmlspecialchars($alumno['nombre']) . '</td>';
    echo '<td>' . htmlspecialchars($alumno['apellido']) . '</td>';
    echo '<td>' . htmlspecialchars($alumno['edad']) . '</td>';
    echo '<td>' . htmlspecialchars($alumno['promedio']) . '</td>';
    echo '<td>' . htmlspecialchars($alumno['grado']) . '</td>';
    echo '<td>' . htmlspecialchars($alumno['seccion']) . '</td>';
    echo '<td>';
    echo '<input type="checkbox" class="checkbox-opcion" name="seleccion[]" value="' . htmlspecialchars($alumno['id']) . '">';
    echo '</td>';
    echo '</tr>';
}
?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
