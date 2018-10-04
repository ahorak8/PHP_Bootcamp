#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$split = explode(" ", $str);
		return($split);
	}

	if ($argc > 1)
	{
		$i = 1;
		$newstr = array();

		while ($i < $argc)
		{
			$splitword = ft_split ($argv[$i]);
			$newstr = array_merge($newstr, $splitword);
			$i++;
		}
		sort ($newstr);
		foreach ($newstr as $word)
		{
			echo $word."\n";
		}
	}
	else
		exit(1);
?>