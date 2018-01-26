<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Contraseña</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="nom" value="" size="30" /></td>
                        <td><input type="text" name="cla" value="" size="30" /></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><input type="submit" value="Iniciar" name="Iniciar" /></td>
                    </tr>
                </tbody>
            </table>

        </form>
        <?php
        if($_GET){
            $nom=$_GET["nom"];
            $cla=$_GET["cla"];
            
            include 'Modelos/consul.php';
            $rob=new consul();
            $lista=$rob->login($nom, $cla);
            while (sizeof($lista)>0){
                header("location:prin.php");
            }
            
        }
        ?>
    </body>
</html>
