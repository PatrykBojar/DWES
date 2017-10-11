<?php

	$num1 = $_GET['a'];
	$num2 = $_GET['b'];

	if ( $num1 > $num2 )
		echo "El número más grande es el " . $num1;
	else
		echo "El número más grande es el " . $num2;
?>
