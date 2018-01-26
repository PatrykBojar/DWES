<!DOCTYPE html>
<html>
<?php
  require_once('controlador.php');
  // Hacemos la consulta del ID que hemos pulsado en la tabla.
  $sql = "SELECT genero, titulo, autor, precio FROM tb_libros WHERE id = ".$_GET['id'];

  $result = $conn->query($sql);
  // Mostramos los datos de cada fila
  $row = $result->fetch_assoc();
  // Variables que guardán el valor actual de la selección del libro.
  $genero = $row['genero'];
  $titulo = $row['titulo'];
  $autor = $row['autor'];
  $precio = $row['precio'];
?>

  <head>
    <meta charset="utf-8">
    <title>MODIFICAR LIBRO</title>
  </head>

  <body>
    <form action="controlador.php" method="post">
      <div class="datosDiv">
        <div class="generoDiv">
          <p id="genero">Género</p>
          <select name="genero">
  <?php
  switch ($row["genero"]) {
    case 'infantil':?>
    <option value="infantil" selected> infantil</option>
    <option value="ficcion">ficcion</option>
    <option value="ensayo" >ensayo</option>
    <?php   break;
    case 'ficcion':?>
    <option value="infantil"> infantil</option>
    <option value="ficcion"  selected>ficcion</option>
    <option value="ensayo" >ensayo</option>
    <?php   break;
    case 'ensayo':?>
    <option value="infantil"> infantil</option>
    <option value="ficcion">ficcion</option>
    <option value="ensayo"  selected >ensayo</option>
    <?php   break;
    default:
      break;
  }
  ?>
    </select>
        </div>

        <p id="modelo">Título<br><input type="text" name="titulo" value="<?php echo $row['titulo'];?>"></p>
        <p id="desc">Autor<br><input type="text" name="autor" value="<?php echo $row['autor'];?>"></p>
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
