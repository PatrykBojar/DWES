<?php
function tablaArray(){

$noms = array ("nom"=> "Alberto Contador",
  "professio" => "Ciclista", "edat"=> 35,
  "naix"=> "Madrid", "equip"=>"Trek");

echo "<table border=1>";
  foreach ($noms as $k => $v) {
      echo "<tr><td> $k </td> <td> $v </td> </tr>";
  }
  echo "</table>";
}

tablaArray();
?>
