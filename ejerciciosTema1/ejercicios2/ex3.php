<?php

	$var = 5;
	if (is_int($var))
	  echo "$var es un int.";
	elseif (is_string($var)) 
	  echo "$var es un string.";
	elseif (is_bool($var)) 
	  echo "$var es un boolean.";
	elseif (is_float($var)) 
	  echo "$var es un número real.";
	else
	  echo "No es ninguno de los anteriores";

?>
