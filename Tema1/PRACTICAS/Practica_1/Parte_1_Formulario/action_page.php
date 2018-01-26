<html>
<head>
  <meta charset="UTF-8">
  <title>Formulario - ¡Trabaja con nosotros!</title>
  <style media="screen">
    body {
      font-family: 'Lato', sans-serif;
      color: white;
      background: #00C9FF;
      background: -webkit-linear-gradient(to right, #92FE9D, #00C9FF);
      background: linear-gradient(to right, #92FE9D, #00C9FF);
    }

    form {
      position: relative;
      margin: 0 auto;
      font-family: 'Lato', sans-serif;
      font-size: 20px;
      width: 450px;
      text-align: center;
      border-radius: 10px;
      background-color: rgba(252, 252, 252, 0.5);
    }

    .error {
      color: #af0000;
      font-size: 15px;
      font-weight: bold;
    }

    p#nameId, p#surnameId, p#dniId, p#telId, p#emailId, p#dateId, p#sexId, p#knowId, p#workId, p#xpId {
      color: #fff;
      font-weight: bold;
    }

    p#sexId, p#xpId, p#knowId {
      position: relative;
      top: -10px;
    }

    div.genderDiv, div.knowledgesDiv, div.workxpDiv {
      position: relative;
    }

    input[type="text"], input[type="tel"], input[type="email"], input[type="date"] {
      width: 220px;
      height: 45px;
      font-size: 16px;
      border: none;
      border-bottom: 2px solid #4A6D00;
      border-radius: 2px;
      transition: border 0.3s;
      background-color: #3CBC8D;
      color: white;
      padding: 12px 20px 12px 40px;
    }

    input[type="text"] {
      background-image: url('user.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      background-size: 25px;
    }

    input[name="dni"] {
      background-image: url('dni.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      background-size: 25px;
    }

    input[type="tel"] {
      background-image: url('phone.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      background-size: 25px;
    }

    input[type="email"] {
      background-image: url('mail.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      background-size: 25px;
    }

    input[type="date"] {
      background-image: url('calendar.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      background-size: 25px;
    }

    input[type="radio"], input[type="checkbox"], select[name="wXp"] {
      cursor: pointer;
    }

    p.footer {
      position: relative;
      text-align: center;
      font-size: 12px;
      color: white;
      font-weight: bold;
    }

    footer strong {
      color: #FF6B6B;
    }

    .buttonDiv {
      position: relative;
      padding: 3px;
    }

    input[type="submit"] {
      background-color: #4fff4f;
      color: white;
      font-weight: bold;
      font-size: 20px;
      text-decoration: none;
      padding: 12px 78px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    input[type="reset"] {
      background-color: #f93b3b;
      color: white;
      font-weight: bold;
      font-size: 20px;
      text-decoration: none;
      padding: 12px 74px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    input[type="text"]:focus, input[type="text"].focus, input[type="tel"]:focus, input[type="tel"].focus, input[type="email"]:focus, input[type="email"].focus, input[type="date"]:focus, input[type="date"].focus {
      background-color: #BCE860;
      transition: 0.15s;
    }

    input[type="submit"]:hover {
      background-color: #30ff30;
      transition: 0.25s all ease;
    }

    input[type="reset"]:hover {
      background-color: #ff2121;
      transition: 0.25s all ease;
    }
  </style>
</head>
    <body>
      <?php
        // Variables semáforo que utilizarán en el <if> que mostrará
        // el formulario o el resultado
        $mostrarResultado = false;
        $nmWrong = true;
        $smWrong = true;
        $dniWrong = true;
        $telWrong = true;
        $emailWrong = true;

        // Variables que se utilizan para mostrar el mensaje de error.
        $nameErr = $surnameErr = $dniErr = $phoneErr = $genderErr = "";

        // Valor por defecto de las variables.
        $name = $surname = $dni = $phone = $email = $gender = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

          /*
          Se asegura de que cualquier tipo de dato introducido por el usuario
          no sea dañino para nuestra base de datos.
          Convierte los posibles scripts, caracteres u otros tipos de datos
          que puedan provocar alguna modificación o daño en la base de datos.
          */
          function test_input($data) {
            // Elimina los espacios en blanco o caracteres raros.
            $data = trim($data);
            // Quia las barras con comillas escapadas.
            $data = stripslashes($data);
            // Convierte caracteres especiales en entidades HTML.
            $data = htmlspecialchars($data);
            return $data;
          }

          // Variables de entrada que guardarán el texto que introduzca el usuario.
          // con el formato seguro.
          $phone = test_input($_POST["usrtel"]);
          $date= test_input($_POST["date"]);
          $xp = test_input($_POST["wXp"]);
          $gender = $_POST["gender"];
          $knowledge = $_POST["knowledges"];
          $submit = $_POST["submit"];


          /*
          Comprueba si el campo nombre contiene números o es vacío, en caso de
          ser así mostrará un mensaje de error y no se procesará
          la información.
          Si el campo es rellenado correctamente se procesará la información.
           */
          if (empty($_POST["name"])) {
            $nameErr = "<br>&#8593 Nombre requerido &#8593";
          } else {
              $name = test_input($_POST["name"]);
              // Comprueba si el nombre contiene solo letras y espacios.
              if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "<br>&#8593 Solo se permiten letras y espacios &#8593";
                $name = "";
              } else {
                  $nmWrong = false;
                }
            }

          /*
          Valida el apellido al igual que la función para comprobar el nombre.
          */
          if (empty($_POST["surname"])) {
            $surnameErr = "<br>&#8593 Apellido requerido &#8593";
          } else {
              $surname = test_input($_POST["surname"]);
              // Comprueba si el apellido contiene solo letras y espacios.
              if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
                $surnameErr = "<br>&#8593 Solo se permiten letras y espacios &#8593";
                $surname = "";
              } else {
                  $smWrong = false;
                }
            }


          if (empty($_POST["email"])) {
            $emailErr = "<br>&#8593 E-mail requerido &#8593";
          } else {
              $email = test_input($_POST["email"]);
              // Comprueba si el correo ha sido escrito de forma correcta.
              // Para ello usamos un método que utiliza una ID del filtro (email)
              // con la variable $email.
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "<br>&#8593Formato incorrecto &#8593";
              } else {
                  $emailWrong = false;
               }
            }

          /*
          Valida si el DNI se ha introducido correctamente: 8 números y 1 letra
          escritas conforme está dado el DNI español.
          */
          if(empty($_POST["dni"])){
            $dniErr = "<br>&#8593 DNI requerido &#8593";
          } else {
              $dni = test_input($_POST["dni"]);
              // Variable que guarda los números (menos el último caracter);
              // Empieza desde el 0 hasta el penúltimo caracter.
              $numeros = substr($dni, 0, -1);
              // Variable que guarda la letra del DNI (último caracter).
              $letra = substr($dni, -1);
              $length = strlen($dni);
              if($length == 9 && is_numeric($numeros) && ctype_alpha($letra)){
                $dni = test_input($dni);
                $dniWrong = false;
              } else {
                  $dniErr = "<br>&#8593 Formato incorrecto &#8593";
                  $dni = "";
                }
            }

          if(empty($_POST["usrtel"])){
            $phoneErr = "<br>&#8593 Teléfono requerido &#8593";
            $phone = "";
          } elseif(is_numeric($_POST["usrtel"])) {
              $phone = test_input($_POST["usrtel"]);
              $telWrong = false;
          } else {
              $phoneErr = "<br>&#8593 Solo se permiten números &#8593";
              $phone = "";
              $telWrong = true;
          }
        }

        if (empty($_POST["gender"])) {
          $genderErr = "<br>&#8593 Sexo requerido &#8593";
        } else {
          $gender = test_input($_POST["gender"]);
        }

       ?>
       <?php
       if ( ( $nmWrong && $smWrong && $dniWrong && $telWrong && $emailWrong ) || ( empty($_POST["name"]) || empty($surname) || empty($dni) || empty($phone) ) ) {
         $mostrarResultado = false;?>
         <!-- ******* FORMULARIO INICIO-->
         <!-- value="$variable" hace que en caso de fallar con el formulario el dato
           permanezca en el campo sin ser borrado automáticamente. -->
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
           <p> <span class="error">* Campo obligatorio.</span></p>
           <div class="datosDiv">
             <p id="nameId">
               Nombre<br>
               <input type="text" name="name" value="<?php echo $name;?>">
               <span class="error">* <?php echo $nameErr;?></span>
             </p>

             <p id="surnameId">
               Apellido<br>
               <input type="text" name="surname" value="<?php echo $surname;?>">
               <span class="error">* <?php echo $surnameErr;?></span>
             </p>

             <p id="dniId">
               DNI<br>
               <input type="text" name="dni" value="<?php echo $dni;?>">
               <span class="error">* <?php echo $dniErr;?></span>
             </p>

             <p id="telId">
               Teléfono<br>
               <input type="tel" name="usrtel" value="<?php echo $phone;?>">
               <span class="error">* <?php echo $phoneErr;?></span>
             </p>

             <p id="emailId">
               E-mail<br>
               <input type="email" name="email" value="<?php echo $email;?>">
             </p>

             <p id="dateId">
               Fecha de nacimiento<br>
               <input type="date" name="date">
             </p>
           </div>
           <div class="genderDiv">
             <p id="sexId" class="error">Sexo</p>
             <div class="radio-toolbar">
               <label><input type="radio" name="gender" value="Hombre" checked> Hombre</label>
               <label><input type="radio" name="gender" value="Mujer"> Mujer</label>
             </div>
           </div>
           <div class="knowledgesDiv">
             <p id="knowId">Conocimientos de progrmación</p>
               <input type="checkbox" name="knowledges[]" value="Java"> Java
               <input type="checkbox" name="knowledges[]" value="HTML5"> HTML5
               <input type="checkbox" name="knowledges[]" value="JavaScript"> JavaScript
               <input type="checkbox" name="knowledges[]" value="PHP"> PHP<br><br>
               <input type="checkbox" name="knowledges[]" value="XML"> XML
               <input type="checkbox" name="knowledges[]" value=".NET"> .NET
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
         <footer>
           <p class="footer">Hecho con <strong>♥</strong> por Patryk.</p>
           <p class="footer">&copy; 2017 Patryk Bojar design<p>
         </footer>
       </body>

       </html>
  <?php } else {
           $mostrarResultado = true;?>
          <!-- ******* FORMULARIO RESPUESTA-->
           <?php
           if (isset($_POST["submit"])){
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
                 }

                 table {
                   margin: 50px auto;

                 }

                 table, th, td {
                     border-collapse: collapse;
                     border-top: 2px solid rgba(242, 242, 242, 0.3);
                 }

                 th, td:last-child{
                   border-bottom: 2px solid rgba(242, 242, 242, 0.3);

                 }

                 td {
                   padding: 20px;
                   text-align: center;
                   border-right: 2px solid rgba(242, 242, 242, 0.3);
                 }

                 th {
                   padding: 25px 10px 25px 10px;
                   text-align: left;
                   background-color: rgba(242, 242, 242, 0.3);
                   border-left: 2px solid rgba(242, 242, 242, 0.3);
                 }

                 p#msgTable{
                   position: relative;
                   margin: 100px;
                   text-align: center;
                   font-size: 25px;
                   color: white;
                   font-weight: bold;
                 }

                 p.footer{
                   position: relative;
                   text-align: center;
                   font-size: 12px;
                   color: white;
                   font-weight: bold;
                 }

                 footer strong {
                  color:#FF6B6B;
                 }
                 </style>
               </head>
               <body>
                 <p id="msgTable">&#11167; Estos son tus datos &#11167;</p>
                 <table>
                   <tr>
                     <th>Nombre:</th>
                     <td><?php echo $name ?></td>
                   </tr>
                   <tr>
                     <th>Apellido:</th>
                     <td><?php echo $surname ?></td>
                   </tr>
                   <tr>
                     <th>DNI:</th>
                     <td><?php echo $dni ?></td>
                   </tr>
                   <tr>
                     <th>Teléfono:</th>
                     <td><?php echo $phone ?></td>
                   </tr>
                   <tr>
                     <th>E-mail:</th>
                     <td><?php echo $email ?></td>
                   </tr>
                   </tr>
                   <tr>
                     <th>Fecha de nacimiento:</th>
                     <td><?php echo $date ?></td>
                   </tr>
                   <tr>
                     <th>Sexo:</th>
                     <td><?php echo $gender ?></td>
                   </tr>
                   <tr>
                     <th>Experiencia:</th>
                     <td><?php echo $xp ?></td>
                   </tr>
                   <tr>
                     <th>Conocimientos:</th>
                     <td>
                       <?php
                         if(empty($knowledge)){
                           echo "No has seleccionado ningún conocimiento.";
                         } else {
                             // Variable que guardará el número de los
                             // elementos (conocimientos) seleccionados en el
                             // array de knowledges[].
                             $knowWrong = false;
                             $pos = count($knowledge);
                             for ($i=0; $i < $pos; $i++) {
                               echo($knowledge[$i] . ", ");
                             }
                           }?>
                     </td>
                   </tr>
                 </table>
                 <footer>
                   <p class="footer">Hecho con <strong>♥</strong> por Patryk.</p>
                   <p class="footer">&copy; 2017 Patryk Bojar design<p>
                 </footer>
               </body>
           <?php }?>
    <?php }?>
