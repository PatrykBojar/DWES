<?php
	$word = $_GET['a'];
	$word2 = $_GET['b'];

	if ( strlen($word) > strlen($word2) )
		echo "La longitud de " . "<b>$word</b>" . " es " . strlen($word);

	else
		echo "La longitud de " . "<b>$word2</b>" . " es " . strlen($word2);
?>
