<?php
  session_start();
  // Si la sesión es iniciada y escrita de forma correcta muestra la tabla.
  if (isset($_SESSION['user'])) {
    header('Location: mostrar.php');
    exit();
  } else {
      // Al cerrar la sesión volvemos al login.
      header('Location: login.php');
      exit();
    }
?>
