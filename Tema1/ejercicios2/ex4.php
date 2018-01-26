<?php

	$var = $_GET['a'];

	if ( (is_int($var)) )
		echo "$var es un entero.";
	elseif ( (is_bool($var)) )
		echo "$var es un boolean.";
	elseif ( (is_float($var)) )
		echo "$var es un número real.";
	else
		echo "$var es un string";
?>
