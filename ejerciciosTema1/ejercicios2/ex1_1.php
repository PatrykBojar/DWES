<?php

$var = $_GET['a'];


if($var >= "1" && $var <= "10"){
	for ( $i = 1; $i <= 10; $i++){
		echo "El resultado de ($var x $i) es " . ($var * $i) . "<br>";
	}
}else
echo "Introduce un número del 1 al 10";

?>
