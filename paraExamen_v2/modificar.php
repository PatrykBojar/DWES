<!DOCTYPE html>
<html>
<?php
require_once('controlador.php');

  $sql = "SELECT tipo, modelo, descripcion, precio FROM components WHERE id = ".$_GET['id'];

  $result = $conn->query($sql);
  // Mostramos los datos de cada fila
  $row = $result->fetch_assoc();
  // Variables de entrada que guardarán el texto que introduzca el usuario.
  // con el formato seguro.
  $tipo = $row['tipo'];
  $modelo = $row['modelo'];
  $desc = $row['descripcion'];
  $precio =  $row['precio'];
?>

  <head>
    <meta charset="utf-8">
    <title>Modificar</title>
  </head>

  <body>
    <form action="controlador.php" method="post">
      <div class="datosDiv">
        <div class="tipoDiv">
          <p id="tipo">Tipo</p>
          <select name="tipo">
  <?php
  switch ($row["tipo"]) {
    case 'Tarjeta Gráfica':?>
    <option value="Tarjeta Gráfica" selected> Tarjeta Gráfica</option>
    <option value="Placa Base">Placa Base</option>
    <option value="Memoria Ram" >Memoria Ram</option>
    <option value="Procesador">Procesador</option>
    <option value="Disco Duro">Disco Duro</option>
    <?php   break;
    case 'Placa Base':?>
    <option value="Tarjeta Gráfica"> Tarjeta Gráfica</option>
    <option value="Placa Base"  selected>Placa Base</option>
    <option value="Memoria Ram" >Memoria Ram</option>
    <option value="Procesador">Procesador</option>
    <option value="Disco Duro">Disco Duro</option>
    <?php   break;
    case 'Memoria Ram':?>
    <option value="Tarjeta Gráfica"> Tarjeta Gráfica</option>
    <option value="Placa Base">Placa Base</option>
    <option value="Memoria Ram"  selected >Memoria Ram</option>
    <option value="Procesador">Procesador</option>
    <option value="Disco Duro">Disco Duro</option>
    <?php   break;
    case 'Procesador':?>
    <option value="Tarjeta Gráfica"> Tarjeta Gráfica</option>
    <option value="Placa Base">Placa Base</option>
    <option value="Memoria Ram" >Memoria Ram</option>
    <option value="Procesador"  selected >Procesador</option>
    <option value="Disco Duro">Disco Duro</option>
    <?php   break;
    case 'Disco Duro':?>
    <option value="Tarjeta Gráfica"> Tarjeta Gráfica</option>
    <option value="Placa Base">Placa Base</option>
    <option value="Memoria Ram" >Memoria Ram</option>
    <option value="Procesador">Procesador</option>
    <option value="Disco Duro" selected>Disco Duro</option>
    <?php   break;
    default:
      break;
  }
  ?>
    </select>
        </div>

        <p id="modelo">Modelo<br><input type="text" name="modelo" value="<?php echo $row['modelo'];?>"></p>
        <p id="desc">Descripción<br><input type="text" name="desc" value="<?php echo $row['descripcion'];?>"></p>
        <p id="precio">Precio<br><input type="text" name="precio" value="<?php echo $row['precio'];?>"></p>
      </div>
      <input style="display:none" type="text" value="<?php echo$_GET['id']?>" name="id">
      <div class="botones">
        <input type="submit" class="guardar" value="Guardar" name="modificar">
        <a href="index.php">
            <input type="button" value="Cancelar">
          </a>
      </div>
    </form>
  </body>

</html>
