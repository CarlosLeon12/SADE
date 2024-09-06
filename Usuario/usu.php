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
    <style>
        .textColor {
            color: #007bff;
        }

        .btn-opcion {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
        }

        .btn-danger-row {
            background-color: #f8d7da !important;
            color: #721c24 !important;
        }
    </style>
</head>

<body>
    <?php include('../menu.php'); ?>

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
            <!-- Formulario para usuarios -->
            <div class="form-section">
                <h2 class="textColor">Agregar/Actualizar Datos del Usuario</h2>

                <form id="formulario-datos" action="actualizar.php" method="post">
    <input type="hidden" id="usuario-id" name="id">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nombreUsu">Nombre completo del Usuario</label>
            <input type="text" class="form-control" id="nombreUsu" name="nombreUsu" required>
        </div>
        <div class="form-group col-md-6">
            <label for="correo">Correo electrónico</label>
            <input type="text" class="form-control" id="correo" name="correo" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="pass">Contraseña</label>
            <input type="password" class="form-control" id="pass" name="pass" required>
        </div>
        <div class="form-group col-md-6">
            <button type="submit" class="btn-guardar gurUsu" id="save-btn">Guardar datos</button>
            <button type="button" class="btn-guardar gurUsu" id="update-btn" style="display:none;">Actualizar datos</button>
        </div>
    </div>
</form>


                <div class="divider"></div>

                <div class="table-container">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Contraseña</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <!-- Los datos de la base de datos se llenarán aquí -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Función para cambiar el estado del usuario
        function changeStatus(id, nuevoEstado, row) {
            fetch('cambiar_estado.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    'id': id,
                    'estado': nuevoEstado
                })
            })
            .then(response => response.text())
            .then(result => {
                console.log(result); // Para depuración
                // Actualizar el color de la fila
                if (nuevoEstado === 0) {
                    row.style.backgroundColor = '#f8d7da'; // Rojo claro
                } else {
                    row.style.backgroundColor = ''; // Restaurar el color original
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Función para editar los datos del usuario
        function editUser(id) {
            // Obtener la fila del usuario seleccionada
            const row = document.querySelector(`tr[data-id="${id}"]`);

            // Obtener los datos de esa fila
            const nombre = row.children[1].textContent;
            const correo = row.children[2].textContent;

            // Asignar los datos a los campos del formulario
            document.getElementById('usuario-id').value = id;
            document.getElementById('nombreUsu').value = nombre;
            document.getElementById('correo').value = correo;

            // Mostrar el botón "Actualizar" y ocultar el de "Guardar"
            document.getElementById('save-btn').style.display = 'none';
            document.getElementById('update-btn').style.display = 'inline-block';
        }

        document.getElementById('formulario-datos').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita el envío por defecto del formulario

    var formData = new FormData(this);
    var id = document.getElementById('usuario-id').value;

    // Determinar si es una actualización o una nueva inserción
    var url = id ? 'actualizar.php' : 'ususql.php';

    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        console.log(result); // Para depuración
        window.location.reload(); // Recargar la página para ver los datos actualizados
    })
    .catch(error => console.error('Error:', error));
});


        document.addEventListener('DOMContentLoaded', function() {
            fetch('consulta.php')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('table-body');
                    tableBody.innerHTML = ''; // Limpia el contenido previo
                    data.forEach(usuario => {
                        const row = document.createElement('tr');
                        row.dataset.id = usuario.id; // Añade un atributo de datos con el ID del usuario
                        row.innerHTML = `
                            <td>${usuario.id}</td>
                            <td>${usuario.nombre}</td>
                            <td>${usuario.correo}</td>
                            <td>***************</td> <!-- Mostrar asteriscos en lugar de la contraseña -->
                            <td>${usuario.estado}</td>
                            <td>
                                <button class="btn-opcion text-success" title="Aprobar" onclick="changeStatus(${usuario.id}, 1, this.parentElement.parentElement)">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="btn-opcion text-danger" title="Eliminar" onclick="changeStatus(${usuario.id}, 0, this.parentElement.parentElement)">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button class="btn-opcion text-primary" title="Editar" onclick="editUser(${usuario.id})">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        `;
                        // Si el estado es 0, pinta la fila de rojo
                        if (usuario.estado == 0) {
                            row.style.backgroundColor = '#f8d7da'; // Rojo claro
                        }
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => console.error('Error al cargar los datos:', error));
        });
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
