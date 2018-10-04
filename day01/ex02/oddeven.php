#!/usr/bin/php
<?php

while (1) {
	echo "Enter a number: ";
	$stdin = fgets(fopen("php://stdin", "r"));
	if (ord($stdin) == 0) {
		echo "^D\n";
		exit;
	}
	else {
		$stdin = trim($stdin);
		if (is_numeric($stdin)) {
			if ($stdin % 2 == 0)
				echo "The number " . $stdin . " is even", PHP_EOL;
			else
				echo "The number " . $stdin . " is odd", PHP_EOL;
		}
		else if ($stdin == "\cd")
			exit;
		else
			echo "'" . trim($stdin) . "' is not a number", PHP_EOL;
	}
}

?>