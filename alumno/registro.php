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
    <style>
        /* Estilos generales */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .content {
            margin: 20px auto;
            padding: 20px;
            width: 79%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top:-2px;
        }

        .contenedor {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .imagen {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .boton-salida {
            background: none;
            border: none;
            color: black;
            text-decoration: none;
            font-size: 25px;
            cursor: pointer;
            font-family: inherit;
        }

        .area,
        .area2 {
            margin-bottom: 30px;
        }

        .table-container {
            max-width: 100%;
            overflow-x: auto;
        }

        .table th,
        .table td {
            text-align: left;
            vertical-align: middle;
        }

        .btn-agregar {
            display: inline-block;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            float: right;
            margin-bottom: 10px;
        }

        .btn-agregar:hover {
            background-color: #45a049;
        }

        .btn-opcion {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: #333;
        }

        .btn-opcion:hover {
            color: #555;
        }

        .tit {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .sidebar {
            font-size: 18px; 
            width: 250px;
            padding: 20px;
            background-color: #343a40;
            color: white;
            position: fixed;
            height: 100%;
            border-radius: 5px;
            margin-top:2px;
        }

        .sidebar h1 {
            font-size: 24px;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 22px;
        }

        .sidebar ul li a:hover {
            text-decoration: underline;
        }

        .content {
            margin-left: 270px;
        }

        .atimg1 {
            margin-top: -32%;
        }
       
        .txalig {
            margin-top: -25%;
            font-size: 25px;
        }

        .btsalir {
            margin-top: -120%;
        }

        .text {
            font-size: 25px;
        }

        .ColorLetra {
            font-size: 28px;
            color: rgba(11, 255, 3, 0.884);
        }

        .input-busqueda {
            width: 30% !important; /* Ajusta el porcentaje según necesites */
        }
    </style>
    <!-- FontAwesome CSS for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="sidebar">
        <h1 class="ColorLetra">SADE</h1>
        <ul>
            <li><a href="../principal/lobi.php">Inicio</a></li>
            <li><a href="../alumno/registro.php">Alumnos</a></li>
            <li><a href="maestros.html">Maestros</a></li>
            <li><a href="materias.html">Materias</a></li>
            <li><a href="grados.html">Grados</a></li>
            <li><a href="promedios.html">Promedios</a></li>
            <li><a href="usuarios.html">Usuarios</a></li>
        </ul>
    </div>

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
            <h1 class="tit">Alumnos</h1>
            <div class="contenedor">
                <input class="form-control input-busqueda" type="text" placeholder="Buscar">
                <button class="btn-agregar" onclick="window.location.href='agregar.php';">Agregar</button>
            </div>
            <div class="table-container">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Edad</th>
                            <th>Promedio</th>
                            <th>Grado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Simulación de datos (Elimina esto cuando conectes con tu base de datos)
                        $alumnos = [
                            ['id' => 1, 'codigo' => '119020', 'nombre' => 'Jesus', 'apellido' => 'Corton', 'edad' => 10, 'promedio' => 83, 'grado' => 'Primero'],
                            ['id' => 2, 'codigo' => '119021', 'nombre' => 'Maria', 'apellido' => 'Lopez', 'edad' => 11, 'promedio' => 87, 'grado' => 'Segundo'],
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
                            echo '<td>';
                            echo '<button class="btn-opcion" title="Ver"><i class="fas fa-eye"></i></button>';
                            echo '<button class="btn-opcion" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
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
