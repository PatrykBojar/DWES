<?php
require_once('baseDatos.php');
// Variables de entrada que guardarán el texto que introduzca el usuario.
// con el formato seguro.
$tipo = $_POST["tipo"];
$modelo = test_input($_POST["modelo"]);
$desc = test_input($_POST["desc"]);
$precio = test_input($_POST["precio"]);
  // AÑADIR REGISTROS
  $sql = "INSERT INTO components (tipo, modelo, descripcion, precio) VALUES ('$tipo', '$modelo', '$desc', $precio)";
  if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
  } else {
      echo "<br>Error:" . $conn->error;
    }

 ?>
