<?php
	function ft_split($str)
	{
		$split = explode(" ", $str);
		$sorted = sort($split);
		return($sorted);
	}
?>