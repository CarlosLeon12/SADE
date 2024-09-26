<?php

include ('../db_connect.php');

$sql = "SELECT codigo_materia, nombre_materia FROM tbl_materias";
$resultado = $conn->query($sql);



?>

<!DOCTYPE html>
<html lang="es">

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
            <h1 class="tit">Materias</h1>
            <div class="contenedor">
                <input class="form-control input-busqueda" type="text" placeholder="Buscar">
                <button class="btn-agregar" onclick="window.location.href='agregarMateria.php';">Agregar</button>
            </div>
            <div class="table-container">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Código</th>
                            <th>Materia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if($resultado->num_rows > 0){
                            $x = 0;
                            while($row = $resultado->fetch_assoc()){
                                $x++;
                                echo "<tr>";
                                echo "<td>" . $x . "</td>";
                                echo "<td>" . $row['codigo_materia'] . "</td>";
                                echo "<td>" . $row['nombre_materia'] . "</td>";
                                echo "<td>
                                        <button class='btn-opcion text-primary'  title='Editar' onclick='window.location.href=\"ver.php?id={$row['codigo_materia']}\"'><i class='fas fa-edit'></i></button> 
                                        <button class='btn-opcion text-danger'  title='Baja' onclick='window.location.href=\"cambiar_estado.php?id={$row['codigo_materia']}\"'><i class='fas fa-times'></i></button>
                                    </td>";
                                echo "</tr>";
                            }
                        }else{
                            echo "<tr><td colspan='4'>No hay datos</td></tr>";
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
    <script src="buscar_materias.js"></script>
</body>

</html>

<?php
$conn->close();
?>
