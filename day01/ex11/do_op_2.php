<?php
	if ($argc != 2) {
		echo "Incorrect Parameters", PHP_EOL;
		exit;
	}
	$arg = str_replace(" ", "", $argv[1]);
	$num1 = intval($arg);
	$op = substr(substr($arg, strlen((string)$num1)), 0, 1);
	$num2 = substr(substr($arg, strlen((string)$num1)), 1);
	if(!is_numeric($num1) || !is_numeric($num2)){
		echo "Syntax Error\n";
		exit();
	}
	switch ($op) {
		case "+":
			$num1 += $num2;
			break;
		case "-":
			$num1 -= $num2;
			break;
		case "*":
			$num1 *= $num2;
			break;
		case "/":
			$num1 /= $num2;
			break;
		case "%":
			$num1 %= $num2;
			break;
	}
	echo $num1, PHP_EOL;
?>