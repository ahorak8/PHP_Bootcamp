#!/usr/bin/php
<?php
	if ($argc != 4) {
		echo "Incorrect Parameters", PHP_EOL;
		exit;
	}
	$a = trim($argv[1]);
	$op = trim($argv[2]);
	$b = trim($argv[3]);
	switch ($op) {
		case "+":
			$a += $b;
			break;
		case "-":
			$a -= $b;
			break;
		case "*":
			$a *= $b;
			break;
		case "/":
			$a /= $b;
			break;
		case "%":
			$a %= $b;
			break;
	}
	echo $a, PHP_EOL;
?>