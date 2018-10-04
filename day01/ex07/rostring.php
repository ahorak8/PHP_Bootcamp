#!/usr/bin/php
<?php
	if ($argc > 1)
	{

		$array = preg_split("/[\s]+/", trim($argv[1]));
		$first = array_shift($array);
		array_push($array, $first);
		$i = 1;
		foreach($array as &$string) 
		{
			echo $string;
			if (++$i <= count($array))
				echo " ";
		}
		echo "\n";
	}	
?>