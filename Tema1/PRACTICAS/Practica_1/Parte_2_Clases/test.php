<?php
require_once("Component.php");
require_once("Processador.php");
require_once("Disco_Duro.php");
require_once("Memoria_Ram.php");
require_once("Placa_Base.php");

$pb = new Placa_Base("N19785495G", "MSI Gaming", "MSI", "", "1151");
$pb->setPrecio(65);

$pb2 = new Placa_Base("","Gigabyte GA-B250M-DS3H", "Gigabyte", 165.75, "1151");
$pb2->setNumSerie(123456789);

$ram = new Memoria_Ram("123456789", "Kingston HyperX Fury Blue", "Kingston", 61.95, "DDR3", "16", "1600");
$ram->setCapacidad(8);

$ram2 = new Memoria_Ram("C123456789Y", "G.Skill Ripjaws V Red", "G.Skill", 400, "DDR4", "32", "4440");
$ram2->setTipo("DDR3");

$cpu = new Processador("A49287312E", "Intel Core i9 8800", "Intel", 1450.99, "20", "40", "4.2");
$cpu->setNombre("Intel i5 5730");

$cpu2 = new Processador("P54799125Z", "AMD FX Series FX-8350", "AMD", 115, "8", "8", "4");
$cpu2->setFrecuencia("2");

$inventari = array($pb, $pb2, $ram, $ram2, $cpu, $cpu2);
$longitud = count($inventari);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>INVENTARIO - PALMA 007</title>
    <style media="screen">
      * {
        margin: 0;
        padding: 0;
      }
      body {
        font-family: 'Open Sans', sans-serif;
        background: #00C9FF;
        background: -webkit-linear-gradient(to right, #92FE9D, #00C9FF);
        background: linear-gradient(to right, #92FE9D, #00C9FF);
        color: #444444;
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
        padding: 10px;
        border: 2px solid rgba(242, 242, 242, 0.3);
      }
      th {
        padding: 25px 10px 25px 10px;
        text-align: left;
        background-color: rgba(242, 242, 242, 0.3);
        border-left: 2px solid rgba(242, 242, 242, 0.3);
      }
      .total{
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <table>
      <tr>
        <th>Producto</th>
        <th>Precio</th>
      </tr>
      <?php
      $suma = 0;
      for ($i=0; $i < $longitud; $i++) {?>
      <tr>
        <td>
          <?php echo $inventari[$i]-> imprimir_descripcio();?>
        </td>
        <td>
        <?php
        echo $inventari[$i]-> getPrecio() . " €";
        $suma = $suma + $inventari[$i]-> getPrecio();
        ?>
        </td>
      </tr>
      <?php } ?>
        <td class="total">TOTAL:</td>
        <td class="total"><?php echo $suma . " €" ?></td>

    </table>
  </body>
</html>
