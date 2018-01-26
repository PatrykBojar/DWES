<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Componentes</title>
  </head>
  <body>
<?php
  require_once('controlador.php');
  // Para realizar la consulta y mostrar la Base de Datos.
  $sql = "SELECT * FROM components";
  $resultado = $conn->query($sql) or trigger_error(mysqli_error($conn)." ".$sql);

?>
    <p>Bienvenido</p>
    <form action="controlador.php" method="post">
        <input type="submit" name="logout" value="Cerrar sesión">
    </form>
<?php
          if ($resultado->num_rows > 0) {
?>
            <table>
              <tr>
                <th>ID</th>
                <th>TIPO</th>
                <th>MODELO</th>
                <th>DESCRIPCIÓN</th>
                <th>PRECIO</th>
                <th>MODIFICAR</th>
                <th>ELIMINAR</th>
              </tr>
<?php
              // Mostramos los datos de cada fila. fetch_assoc saca filas del ArrayAccess
              // este while hace que mientras todo sea true iremos metiendo filas en $row.
           while($row = $resultado->fetch_assoc()) { ?>
          <tr>
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["tipo"]; ?></td>
              <td><?php echo $row["modelo"]; ?></td>
              <td><?php echo $row["descripcion"]; ?></td>
              <td><?php echo $row["precio"] . "€"; ?></td>
              <td>
                <a href="modificar.php?id=<?php echo $row["id"];?>">
                  <input class="modificar" type="button" value="Modificar">
                </a>
              </td>
              <td>
                <a href="controlador.php?id=<?php echo $row['id']."&b";?>">
                  <input class="eliminar" type="button" value="&#10005;">
                </a>
              </td>
              <?php } ?>
          </tr>
      </table>
      <form action="altas.php">
          <input type="submit" class="nuevo" value="Insertar registro">
      </form>
<?php
  }elseif ($result == false) {
      echo "La consulta que ha solicitado en el archivo baseDatos.php tiene errores de sintaxis.";
  } else { ?>
  <form action="altas.php">
      <input type="submit" class="nuevo" value="Insertar registro">
  </form>
<?php }?>

  </body>
</html>
