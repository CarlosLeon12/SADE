<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <form action="../acciones/usuarios.php">
      <div class="form-group">
        <label for="email">Correo electronico</label>
        <input type="email" id="email" name="email">
      </div>
      <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password">
      </div>
      <button type="submit">Iniciar sesión</button>
    </form>
    <p><a href="#">Olvidé mi contraseña?</a></p>
  </div>
</body>
</html>
