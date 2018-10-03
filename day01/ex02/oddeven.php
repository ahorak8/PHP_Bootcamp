<?php
	$input = fopen("php://stdin", "r");
	while ($input)
	{
		echo "Enter a number: ";
		$number = fgets($input);
		if ($number)
		{
			if (is_numeric($number))
			{
				if ($number % 2 == 0)
					echo "The number " . $number . " is even\n";
				else
					echo "The number " . $number . " is odd\n";
			}
			else
				echo "'" . $number . ""' is not a number\n";
		}
	}
?>