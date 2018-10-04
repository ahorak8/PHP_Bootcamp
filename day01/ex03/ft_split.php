
<?php
	function ft_split($str)
	{
		$split = preg_split("/[\s]+/", $str);
		sort($split);
		return($split);
	}
?>