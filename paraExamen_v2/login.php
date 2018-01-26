<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Iniciar sesión</title>
</head>
<body>
  <form action="controlador.php" method="post">
    <div class="container">
      <label><b>Usuario</b></label>
      <input type="text" placeholder="Introduce usuario" name="user" value="patryk"required>

      <label><b>Contraseña</b></label>
      <input type="password" placeholder="Introduce contraseña" name="password" value="patryk"required>

      <input type="submit" name="login" value="Iniciar sesión">
    </div>
  </form>
</body>
</html>
