<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Libros</title>
    <style media="screen">
      body {
        font-family: Arial, sans-serif;
      }

      a {
        text-decoration: none;
      }
      table {
            position: relative;
            margin: 50px auto;
            width: 85%;
          }

      table, th, td {
        border-collapse: collapse;
        border-top: 2px solid rgba(210, 210, 210, 0.3);
      }

      th, td {
        border-bottom: 2px solid rgba(210, 210, 210, 0.3);
      }

      td {
        padding: 8px;
        text-align: center;
        border: 2px solid rgba(210, 210, 210, 0.3);
        font-size: 12px;
      }

      th {
        padding: 25px 10px 25px 10px;
        text-align: center;
        background-color: rgba(210, 210, 210, 0.3);
        border: 2px solid rgba(210, 210, 210, 0.3);
        font-size: 16px;
      }
      #usr_type{
        font-weight: bold;
        font-size: 18px;
      }
    </style>
  </head>
  <body>
<?php
  require_once('controlador.php');
  // Para realizar la consulta y mostrar la Base de Datos ordenada por título.
  $sql = "SELECT * FROM tb_libros ORDER BY titulo";
  $resultado = $conn->query($sql) or trigger_error(mysqli_error($conn)." ".$sql);

?>
    <div id="usr_type" style="float:right;margin-top:-50px;"><p>Hola, <?php echo $_SESSION['user'] ?></p></div>
    <form style="margin-top:50px;" action="controlador.php" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>
<?php
  if ($resultado->num_rows > 0) {
?>
   <table>
    <tr>
      <th>ID</th>
      <th>TÍTULO</th>
      <th>AUTOR</th>
      <th>GÉNERO</th>
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
    <td><?php echo $row["titulo"]; ?></td>
    <td><?php echo $row["autor"]; ?></td>
    <td><?php echo $row["genero"]; ?></td>
    <td><?php echo $row["precio"] . "€"; ?></td>
    <td>
      <a href="modificar.php?id=<?php echo $row["id"];?>">
        <input class="modificar" type="button" value="Modificar">
      </a>
    </td>
    <td>
      <a href="controlador.php?id=<?php echo $row['id']."&b";?>">
        <input class="eliminar" type="button" value="Borrar">
      </a>
    </td>
<?php
  }
?>
    </tr>
  </table>
    <form action="altas.php">
      <input type="submit" class="nuevo" value="Nuevo">
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
