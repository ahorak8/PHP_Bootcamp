#!/usr/bin/php
<?php
	function ft_is_sort($arr)
	{
		$new = $arr;
		sort($new);
		if (array_diff_assoc($new, $arr) != NULL)
			return false;
		return true;
	}
?>