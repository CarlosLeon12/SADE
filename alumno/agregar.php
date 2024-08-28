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
            margin-top: -2px;
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
            margin-top: 2px;
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
            width: 30% !important; 
        }

        .form-section {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background-color: #fff;
            margin-bottom: 20px;
        }

        .form-section h2 {
            margin-top: 0;
        }

        .divider {
            margin: 20px 0;
            border-top: 1px solid #ddd;
            border: solid rgb(153, 153, 153) 1px;
        }

        .form-row {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .scrollable-area {
            max-height: 600px; /* Ajusta la altura máxima según necesites */
            overflow-y: auto;
        }

        .btn-guardar {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-guardar:hover {
            background-color: #0056b3;
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

        <div class="area2 scrollable-area">
            <!-- Formulario para alumnos -->
            <div class="form-section">
                <h2>Datos del Alumno</h2>
                <form id="formulario-datos">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="codigo">Código</label>
                            <input type="number" class="form-control" id="codigo" name="codigo" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cui">CUI</label>
                            <input type="number" class="form-control" id="cui" name="cui" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="grado">Grado</label>
                            <select class="form-control" id="grado" name="grado" required>
                                <option value="">Seleccione un grado</option>
                                <option value="1">Primero</option>
                                <option value="2">Segundo</option>
                                <option value="3">Tercero</option>
                                <option value="4">Cuarto</option>
                                <option value="5">Quinto</option>
                                <option value="6">Sexto</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fecha-nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha-nacimiento" name="fecha-nacimiento" required>
                        </div>
                    </div>
                   
                    <div class="divider"></div>

                    <!-- Formulario para datos del padre/madre sin encapsulamiento -->
<h2>Datos del Padre/Madre</h2>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="dpi">DPI</label>
        <input type="number" class="form-control" id="dpi" name="dpi" required>
    </div>
    <div class="form-group col-md-6">
        <label for="parentesco">Parentesco</label>
        <select class="form-control" id="parentesco" name="parentesco" required>
            <option value="">Seleccione un parentesco</option>
            <option value="Padre">Padre</option>
            <option value="Madre">Madre</option>
            <option value="Tia">Tía</option>
            <option value="Tio">Tío</option>
            <option value="Abuelo">Abuelo</option>
            <option value="Abuela">Abuela</option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nombre-padre">Nombre</label>
        <input type="text" class="form-control" id="nombre-padre" name="nombre-padre" required>
    </div>
    <div class="form-group col-md-6">
        <label for="apellido-padre">Apellido</label>
        <input type="text" class="form-control" id="apellido-padre" name="apellido-padre" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="telefono">Teléfono</label>
        <input type="number" class="form-control" id="telefono" name="telefono" required>
    </div>
    <div class="form-group col-md-6">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" required>
    </div>
</div>


                    <!-- Botón para guardar todos los datos -->
                    <div class="text-right">
                        <button type="submit" class="btn-guardar">Guardar todos los datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
