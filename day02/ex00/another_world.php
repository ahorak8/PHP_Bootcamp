#!/usr/bin/php
<?php
	if ($argc > 1)
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
?>