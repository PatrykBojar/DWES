<?php

$var = $_GET['a'];
$var2 = $_GET['b'];
$signo = $_GET['o'];


switch ($signo) {
	case "sum":
		echo "Resultado: " . ($var + $var2);
		break;
	case "res":
		echo "Resultado: " . ($var - $var2);
		break;
	case "div":
		echo "Resultado: " . ($var / $var2);
		break;
	case "mult":
		echo "Resultado: " . ($var * $var2);
		break;
	case "pow":
		echo "Resultado: " . pow($var, $var2);
		break;
	default:
		echo "Vaya, vaya. Parece que algo ha ido mal :(";
}


?>
