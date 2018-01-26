<html>

<body>

  <head>
    <meta charset="UTF-8">
    <title>Formulario - ¡Trabaja con nosotros!</title>
    <link rel="stylesheet" href="./style.css">
  </head>
  <form action="action_page.php" method="post">
    <div class="datosDiv">
      <p id="nameId">
        Nombre<br>
        <input type="text" name="name">
      </p>

      <p id="surnameId">
        Apellido<br>
        <input type="text" name="surname">
      </p>

      <p id="dniId">
        DNI<br>
        <input type="text" name="dni">
      </p>

      <p id="telId">
        Teléfono<br>
        <input type="tel" name="usrtel">
      </p>

      <p id="emailId">
        E-mail<br>
        <input type="email" name="email">
      </p>

      <p id="dateId">
        Fecha de nacimiento<br>
        <input type="date" name="date">
      </p>
    </div>
    <div class="genderDiv">
      <p id="sexId">Sexo</p>
      <div class="radio-toolbar">
        <label><input type="radio" name="gender" value="Hombre"> Hombre</label>
        <label><input type="radio" name="gender" value="Mujer"> Mujer</label>
      </div>
    </div>
    <div class="knowledgesDiv">
      <p id="knowId">Conocimientos de progrmación</p>
      <input type="checkbox" name="knowledges[]" value="Java"> Java<br>
      <input type="checkbox" name="knowledges[]" value="HTML5"> HTML5<br>
      <input type="checkbox" name="knowledges[]" value="JavaScript"> JavaScript<br>
      <input type="checkbox" name="knowledges[]" value="PHP"> PHP<br>
      <input type="checkbox" name="knowledges[]" value="XML"> XML<br>
      <input type="checkbox" name="knowledges[]" value=".NET"> .NET<br>
    </div>
    <div class="workxpDiv">
      <p id="xpId">Experiencia laboral</p>
      <select name="wXp">
        <option value="Sin experiencia">Sin experiencia</option>
        <option value="< 1 año">< 1 año</option>
        <option value="< 2 años">< 2 años</option>
        <option value="> 2 años">> 2 años</option>
      </select>
    </div>
    <div class="buttonDiv">
      <input type="reset" name="reset" value="Limpiar">
      <input type="submit" name="submit" value="Enviar">
    </div>
  </form>
</body>

</html>

<?php



if ( isset($_POST['submit']) ){

  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $dni = $_POST['dni'];
  $email = $_POST['email'];
  $date= $_POST['date'];
  $gender = $_POST['gender'];
  $knowledge = $_POST['knowledges'];
  $xp = ($_POST['wXp']);
  $submit = $_POST['submit'];

  $emptyField = false;
  $whatToSee = "";

  echo "Nombre: ".$name."<br>";
  echo "Apellido: ".$surname."<br>";
  echo "DNI: ".$dni."<br>";
  echo "E-mail: ".$email."<br>";
  echo "Sexo: ".$gender."<br>";
  echo "Experiencia: ".$xp."<br>";

    if( empty($knowledge) ){
      echo "No has seleccionado ningún conocimiento.";
    } else {
      // Variable que guardará el número de los
      // elementos (conocimientos) seleccionados en el
      // array de knowledges[].
      $pos = count($knowledge);
      echo "Has seleccionado $pos conocimiento: ";
      for ($i=0; $i < $pos; $i++) {
        echo($knowledge[$i] . ", ");
      }
    }
}


?>
