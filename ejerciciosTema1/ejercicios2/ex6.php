<?php

$num_mes = $_GET['a'];

switch($num_mes){
	case "1":
		echo "Has decidido escribir un " . $num_mes . ", que corresponde 
			al primer mes del año, <b>enero</b>.";
		break;
	case "2":
		echo "Has decidido escribir un " . $num_mes . ", que corresponde a <b>febrero</b>.";
		break;
	case "3":
		echo "Has decidido escribir un " . $num_mes . ", que corresponde a <b>marzo</b>.";
		break;
	case "4":
		echo "Has decidido escribir un " . $num_mes . ", que corresponde a <b>abril</b>.";
		break;
	case "5":
		echo "Has decidido escribir un " . $num_mes . ", que corresponde a <b>mayo</b>.";
		break;
	case "6":
		echo "Has decidido escribir un " . $num_mes . ", que corresponde a <b>junio</b>.";
		break;
	case "7":
		echo "Has decidido escribir un " . $num_mes . ", que corresponde a <b>julio</b>.";
		break;
	case "8":
		echo "Has decidido escribir un " . $num_mes . ", que corresponde a <b>agosto</b>.";
		break;
	case "9":
		echo "Has decidido escribir un " . $num_mes . ", que corresponde a <b>septiembre</b>.";
		break;
	case "10":
		echo "Has decidido escribir un " . $num_mes . ", que corresponde a <b>octubre</b>.";
		break;
	case "11":
		echo "Has decidido escribir un " . $num_mes . ", que corresponde a <b>noviembre</b>.";
		break;
	case "12":
		echo "Has decidido escribir un " . $num_mes . ", que corresponde a <b>diciembre</b>.";
		break;
	default:
		echo "Al parecer has escrito algo mal.<br><b>RESCUERDA USAR NÚMEROS del 1 al 12.</b>";

}

?>
