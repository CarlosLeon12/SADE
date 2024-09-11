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

<style>
   .textColor{
        color: rgb(0, 228, 49);
    }
</style>

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

        <div class="area2 scrollable-area">
            <!-- Formulario para alumnos -->
            <div class="form-section">
                <h2 class="textColor">Ver Datos del Alumno</h2>
                <!---------------------------Aqui  mediante el post se envia el formulario-->
                <form action="../inserciones.php" method="POST" id="ingresarAlumno">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cui">CUI</label>
                            <input type="number" class="form-control" id="cui" name="cui" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidos">Nombres</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                        </div>
                    </div>
                     
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edad">Edad</label>
                            <input type="text" class="form-control" id="edad" name="edad" required>
                        </div>
                    </div>

                    <div class="form-row">

                    <div class="form-group col-md-6">
                            <label for="seccion">Grado</label>
                            <select class="form-control" id="seccion" name="seccion" required>
                                <option value="">Seleccione un grado</option>
                                <option value="1">Primero</option>
                                <option value="2">Segundo</option>
                                <option value="3">Tercero</option>
                            </select>
                    </div>


                    <div class="form-group col-md-6">
                            <label for="seccion">Seccion</label>
                            <select class="form-control" id="seccion" name="seccion" required>
                                <option value="">Seleccione una seccion</option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                            </select>
                        </div>

                    </div>
                    

                    <!-- Divider between forms -->
                    <div class="divider"></div>

                    <!-- Formulario para datos del padre/madre -->
                    <h2 class="textColor">Ver Datos del Encargado</h2>
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
                            <label for="seccion">Departamento</label>
                            <select class="form-control" id="departamento" name="departamento" required>
                                <option value="">Seleccione un departamento</option>
                                <option value="1">Zacapa</option>
                                <option value="2">Guatemala</option>
                                <option value="3">Izabal</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="municipio">Municipio</label>
                            <select class="form-control" id="municipio" name="municipio" required>
                                <option value="">Seleccione un municipio</option>
                                <option value="1">Usumatlan</option>
                                <option value="2">Teculutan</option>
                                <option value="3">San Jorge</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefono">Direccion</label>
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
