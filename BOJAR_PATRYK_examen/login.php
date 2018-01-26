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
      <input id="name" type="text" placeholder="Introduce usuario" name="user" required>
      <label><b>Contraseña</b></label>
      <input type="password" placeholder="Introduce contraseña" name="password" required>
      <input type="submit" name="login" value="Iniciar sesión">
    </div>
<?php
  // Si ingresamos el usuario o la contraseña el mal se mostrará un mensaje de
  // error. Comprobamos si los valores del enlace son iguales a los de la condición.
  if(isset($_GET['error']) && $_GET['error'] == 1){ ?>
        <h3>El usuario y/o la contraseña son incorrectos.</h3>
  <?php } ?>
  </form>
</body>

</html>
