<!DOCTYPE html>
<html>
<?php
require_once('controlador.php');

 ?>
<head>
  <meta charset="utf-8">
  <title>ALTA LIBRO</title>
</head>

<body>
  <h1>Alta libro</h1>
  <form action="controlador.php" method="post">
    <div class="datosDiv">
      <div class="tipoDiv">
        <p id="tipo">Genero</p>
        <select name="genero">
          <option value="infantil">infantil</option>
          <option value="ficcion">ficcion</option>
          <option value="ensayo">ensayo</option>

        </select>
      </div>

      <p id="titulo">Título<br><input type="text" name="titulo" value=""></p>
      <p id="autor">Autor<br><input type="text" name="autor" value=""></p>
      <p id="precio">Precio<br><input type="text" name="precio" value=""></p>
    </div>
    <div class="botones">
      <input type="submit" class="guardar" value="Guardar" name="alta">
      <a href="index.php">
        <input type="button" value="Cancelar" />
      </a>
    </div>
  </form>
</body>

</html>
