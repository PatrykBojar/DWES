<?php
  session_start();
  // Función para SQL injection, comprueba si todos los campos escritos no
  // contienen datos peligrosos para la base de datos.
  function test_input($data) {
    // Elimina los espacios en blanco o caracteres raros.
    $data = trim($data);
    // Quia las barras con comillas escapadas.
    $data = stripslashes($data);
    // Convierte caracteres especiales en entidades HTML.
    $data = htmlspecialchars($data);
    return $data;
  }

  // Nos conectamos a una Base de Datos.
  $servername = "localhost";
  $username = "user";
  $password = "user";
  $dbname = "bd3";
  // Creamos la conexión.
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Variable que guardará el mensaje de error de login
  $_SESSION['mensaje'] = 'El usuario y/o la contraseña son incorrectos';



  // Variables con el nombre del usuario.
  if (isset($_POST['login'])) {
    // Al pulsar el submit de login.php nos guarda los valores en estas variables.
    $user = test_input($_POST['user']);
    $passwd = test_input($_POST['password']);

    // Para realizar la consulta de los usuarios y comprobar si
    // el nombre de usuario y su contraseña existen y coinciden.
    $sql = "SELECT * FROM tb_usuarios WHERE usuario = '$user' AND password = '$passwd'";
    $resultado = $conn->query($sql) or trigger_error(mysqli_error($conn)." ".$sql);
    if ($resultado->num_rows > 0) {
      while($row=$resultado->fetch_assoc()){
        // En caso de que existan empezamos una sesión.
        // session_start — Iniciar una nueva sesión o reanudar la existente
        session_start();
        $_SESSION['user'] = $row['usuario'];
        header('Location: index.php');
        exit();
      }
    } else {
        // En caso de poner un usuario y contraseña incorrectos nos redireccionará
        // al login con un enlace nuevo que usaremos en el condicional del login
        // para mostrar un mensaje de error.
        header('Location: login.php?error=1');
        exit();
      }
  }



  // CERRAR LA SESIÓN
  if (isset($_POST['logout'])) {
    session_start();
    session_unset($_SESSION['usuario']);
    header('Location: index.php');
    exit();
  }
  //************************ AÑADIR REGISTRO ************************//
  if (isset($_POST['alta'])) {
    $titulo = test_input($_POST['titulo']);
    $autor = test_input($_POST['autor']);
    $genero = $_POST['genero'];
    $precio = test_input($_POST['precio']);
    // Comprobamos si los campos introducidos son los correctos:
    // titulo: texto y no vacío.
    // autor: texto y no vacío.
    // Precio: número y no vacío.
    if (empty($_POST['titulo']) || empty($_POST['autor']) || empty($_POST['precio'])) {
      header('Location: altas.php');
      exit();
    } elseif(is_numeric($_POST['precio'])) {
        // Variables de entrada que guardarán el texto que introduzca el usuario.
        // con el formato seguro.
        $titulo = test_input($_POST['titulo']);
        $autor = test_input($_POST['autor']);
        $precio = test_input($_POST['precio']);
        // AÑADIR REGISTROS
        $sql = "INSERT INTO tb_libros (genero, titulo, autor, precio) VALUES ('$genero', '$titulo', '$autor', $precio)";
        if ($conn->query($sql) === TRUE) {
          header('Location: index.php');
          exit();
        } else {
            echo "<br>Error:" . $conn->error;
          }
      } else {
          header('Location: altas.php');
          exit();
        }
    }
    //************************ MODIFICAR ************************//
    if (isset($_POST['modificar'])) {
      // El id con que haremos el update.
      $id = $_POST['id'];
      // Comprobamos si los campos introducidos son los correctos:
      // Modelo: texto y no vacío.
      // Descripción: texto y no vacío.
      // Precio: número y n vacío.
      if (empty($_POST['titulo']) || empty($_POST['autor']) || empty($_POST['precio'])) {
        // Si los campos están vacíos nos volverá a mostrar el formulario con los
        // datos correspondientes.
        header('Location: modificar.php?id='.$id);
        exit();
      } elseif(is_numeric($_POST['precio'])) {
          // Variables de entrada que guardarán el texto que introduzca el usuario.
          // con el formato seguro.
          $titulo = test_input($_POST['titulo']);
          $autor = test_input($_POST['autor']);
          $genero = $_POST['genero'];
          $precio = test_input($_POST['precio']);
          // Query para modificar todos los campos donde la id sea igual a la id del enlace.
          $sql = "UPDATE tb_libros SET genero='$genero',titulo='$titulo',autor='$autor',precio=$precio WHERE id='$id'";
          echo $sql;
          if ($conn->query($sql) === TRUE) {
            header('Location: index.php');
            exit();
          } else {
            echo "<br>Error:" . $conn->error;
            }
        } else {
            // Si los campos están vacíos nos volverá a mostrar el formulario con los
            // datos correspondientes.
            header('Location: modificar.php?id='.$id);
          }
    }
    //************************ ELIMINAR ************************//
    elseif (isset($_GET['id']) && isset($_GET['b'])) {
      $id = $_GET['id'];
      $sql = "DELETE FROM tb_libros WHERE id = $id";
      if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit();
      } else{
          echo "<br><b>ERROR:<b> " . $conn->error;
      }
    }



  // final.
  // Comprobar si el usuario de sesión (sesión inicada) está creado,
  // si no, nos devuelve al login
  if (!isset($_SESSION['user'])){
    header('Location: login.php');
    exit();
  }
?>
