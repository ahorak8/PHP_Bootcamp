<?php
	if ($argc == 2)
	{
		$trim = trim($argv[1], " ");
		$str = explode(" ", $trim);

		foreach ($str as $word)
		{
			if (end($str) == $word)
				echo "$word\n";
			elseif ($word)
				echo "$word ";
		}
	}
	else
		exit(1);
?>