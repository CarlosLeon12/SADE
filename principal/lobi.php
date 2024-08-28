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
            margin-top:-0px;
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

        .slider {
            position: relative;
            width: 100%;
            height: 500px; /* Ajusta la altura según necesites */
            overflow: hidden;
            margin-top: 5%;
            background-color: #e9ecef;
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            transition: opacity 1s ease-in-out;
        }

        .slide img {
            width: 100%;
            height: 100%;
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
                        <button class="boton-salida" onclick="window.location.href='../Login/index.php';">
                            <img class="imagen btsalir" src="../imagenes/salida.png" alt="Salida">
                        </button>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="slider">
            <div class="slide" style="opacity: 1;">
                <img src="../imagenes/imagen1.jpg" alt="Imagen 1">
            </div>
            <div class="slide" style="opacity: 0;">
                <img src="../imagenes/imagen2.jpg" alt="Imagen 2">
            </div>
            <div class="slide" style="opacity: 0;">
                <img src="../imagenes/imagen3.jpg" alt="Imagen 3">
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Slider script
        const slides = document.querySelectorAll('.slide');
        let currentSlide = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.opacity = i === index ? '1' : '0';
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        setInterval(nextSlide, 5000); // Cambia de imagen cada 2 segundos
    </script>
</body>

</html>
