<!DOCTYPE html>
<html>
<?php
require_once('controlador.php');

 ?>
<head>
  <meta charset="utf-8">
  <title>ALTA COMPONENTE</title>
</head>

<body>
  <h1>Alta Componente</h1>
  <form action="controlador.php" method="post">
    <div class="datosDiv">
      <div class="tipoDiv">
        <p id="tipo">Tipo</p>
        <select name="tipo">
          <option value="Tarjeta Gráfica">Tarjeta Gráfica</option>
          <option value="Placa Base">Placa Base</option>
          <option value="Memoria Ram">Memoria Ram</option>
          <option value="Procesador">Procesador</option>
          <option value="Disco Duro">Disco Duro</option>
        </select>
      </div>

      <p id="modelo">Modelo<br><input type="text" name="modelo" value=""></p>
      <p id="desc">Descripción<br><input type="text" name="desc" value=""></p>
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
