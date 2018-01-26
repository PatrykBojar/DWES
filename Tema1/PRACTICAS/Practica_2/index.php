<?php
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <style media="screen">
        * {
            margin: 0;
            padding: 0;
          }

          body {
            background: #00C9FF;
            background: -webkit-linear-gradient(to right, #92FE9D, #00C9FF);
            background: linear-gradient(to right, #92FE9D, #00C9FF);
            font-family: Arial, sans-serif;
          }

          table {
            position: relative;
            margin: 50px auto;
            width: 85%;
          }

          table, th, td {
            border-collapse: collapse;
            border-top: 2px solid rgba(242, 242, 242, 0.3);
          }

          th, td {
            border-bottom: 2px solid rgba(242, 242, 242, 0.3);
          }

          td {
            padding: 8px;
            text-align: center;
            border: 2px solid rgba(242, 242, 242, 0.3);
            font-size: 12px;
          }

          th {
            padding: 25px 10px 25px 10px;
            text-align: center;
            background-color: rgba(242, 242, 242, 0.3);
            border: 2px solid rgba(242, 242, 242, 0.3);
            font-size: 16px;
          }

          form {
            position: relative;
            margin-left: 45%;
          }

          input[class="nuevo"] {
            position: absolute;
            margin-top: -40px;
            padding: 12px 5%;
            font-weight: bold;
            font-size: 15px;
            text-decoration: none;
            color: white;
            background-color: #555;
            cursor: pointer;
            border: 1px solid #555;
            border-radius: 3px;
            transition: .4s ease;
          }

          input[class="modificar"] {
            font-weight: bold;
            font-size: 15px;
            color: white;
            background-color: #555;
            cursor: pointer;
            border: 1px solid #555;
            border-radius: 3px;
            padding: 4px 4px;
            width: 90px;
          }
          input[class="eliminar"] {
            font-weight: bold;
            font-size: 15px;
            color: white;
            background-color: #ff4949;
            cursor: pointer;
            border: 1px solid #ff4949;
            border-radius: 3px;
            padding: 4px 4px;
            width: 40px;
          }
          a {
            text-decoration: none;
          }
    </style>
    <title>BASE DE DATOS - COMPONENTES</title>
  </head>
  <body>
      <?php
        require_once('baseDatos.php');
        if ($result->num_rows > 0) { ?>
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
         while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["tipo"]; ?></td>
            <td><?php echo $row["modelo"]; ?></td>
            <td><?php echo $row["descripcion"]; ?></td>
            <td><?php echo $row["precio"] . "€"; ?></td>
            <td>
              <a href="controlador_modificar.php?id=<?php echo $row["id"];?>">
                <input class="modificar" type="button" value="Modificar">
              </a>
            </td>
            <td>
              <a href="controlador_eliminar.php?id=<?php echo $row["id"];?>">
                <input class="eliminar" type="button" value="&#10005;">
              </a>
            </td>
            <?php } ?>
        </tr>
    </table>
    <form action="altas.php">
        <input type="submit" class="nuevo" value="Insertar registro" />
    </form>
    <?php
  } elseif ($result == false) {
      echo "La consulta que ha solicitado en el archivo baseDatos.php tiene errores de sintaxis.";
  } else { ?>
  <form action="controlador_alta.php">
      <input type="submit" class="nuevo" value="Insertar registro" />
  </form>
<?php }?>
  </body>
</html>
