<?php
  require_once('baseDatos.php');
  require_once('modificar.php');

  // MODIFICAR LOS REGISTROS EXISTENTES
  // Variables de entrada que guardarán el texto que introduzca el usuario.
  // con el formato seguro.
  $sql = "UPDATE components SET tipo='$tipoN',modelo='$modeloN',descripcion='$descN',precio='$precioN' WHERE  id= '$id'";
  if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
  } else
      echo "<br>Error:" . $conn->error;
?>
