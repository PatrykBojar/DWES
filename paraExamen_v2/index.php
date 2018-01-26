<?php
session_start();
if (isset($_SESSION['user'])) {
  header('Location: mostrar.php');
  exit();
}else{
  header('Location: login.php');
  exit();
}
?>
