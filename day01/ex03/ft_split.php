#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$split = preg_split("/[\s]+/", $str);
		$sorted = sort($split);
		return($sorted);
	}
?>