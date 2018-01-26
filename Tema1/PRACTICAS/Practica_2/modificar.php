<!DOCTYPE html>
<html>
<?php
  $id = $_GET['id'];
  $sql = "SELECT * FROM components WHERE id = $id";
  $result = $conn->query($sql);
  // Mostramos los datos de cada fila
  $row = $result->fetch_assoc();

  $tipoN = $_POST["tipoN"];
  $modeloN = test_input($_GET["modelo"]);
  $descN = test_input($_POST["desc"]);
  $precioN = test_input($_POST["precio"]);
?>
<head>
  <meta charset="utf-8">
  <title>MODIFICAR COMPONENTE</title>
  <style media="screen">
    input[type="text"]{
      width: 750px;
    }
    </style>
</head>

<body>
  <form action="index.php" method="post">
    <div class="datosDiv">
      <div class="tipoDiv">
        <p id="tipo">Tipo</p>
        <select name="tipoN">
            <option value="<?php echo $row['tipo'];?>"<?php if($row['tipo'] == 'Tarjeta Gráfica') echo"selected"; ?>>Tarjeta Gráfica</option>
            <option value="<?php echo $row['tipo'];?>"<?php if($row['tipo'] == 'Placa Base') echo"selected"; ?>>Placa Base</option>
            <option value="<?php echo $row['tipo'];?>" <?php if($row['tipo'] == 'Memoria Ram') echo"selected"; ?>>Memoria Ram</option>
            <option value="<?php echo $row['tipo'];?>"<?php if($row['tipo'] == 'Procesador') echo"selected"; ?>>Procesador</option>
            <option value="<?php echo $row['tipo'];?>"<?php if($row['tipo'] == 'Disco Duro') echo"selected"; ?>>Disco Duro</option>
          </select>
      </div>

      <p id="modelo">Modelo<br><input type="text" name="modeloN" value="<?php echo $row['modelo'];?>"></p>
      <p id="desc">Descripción<br><input type="text" name="descN" value="<?php echo $row['descripcion'];?>"></p>
      <p id="precio">Precio<br><input type="text" name="precioN" value="<?php echo $row['precio'];?>"></p>
    </div>
    <div class="botones">
      <input type="submit" class="guardar" value="Guardar">
      <a href="index.php">
          <input type="button" value="Cancelar">
        </a>
    </div>
  </form>
</body>

</html>
