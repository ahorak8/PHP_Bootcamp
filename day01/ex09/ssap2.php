<?php
	function is_alpha($str) {
		$str = str_split(strtolower($str));
		foreach($str as $char) {
			if (ord($char) < 97 || ord($char) > 122)
				return false;
		}
		return true;
	}
	
	function letter_comp($a, $b){
		$a = strtolower($a);
		$b = strtolower($b);
		$val_a = is_alpha($a) ? 1 : 3;
		$val_a = is_numeric($a) ? 2 : $val_a;
		$val_b = is_alpha($b) ? 1 : 3;
		$val_b = is_numeric($b) ? 2 : $val_b;
		return ($val_a == $val_b) ? (strcmp($a, $b)) : ($val_a - $val_b);
	}
	
	function compare($a, $b){
		$i = 0;
		while ($i < min(strlen($a), strlen($b))) {
			if (letter_comp($a[$i], $b[$i]) == 0)
				$i++;
			else
				return (letter_comp($a[$i], $b[$i]) > 0) ? 1 : -1;
		}
		if (strlen($a) == strlen($b))
			return (0);
		return strlen($a) < strlen($b) ? -1 : 1;
	}
	
	if ($argc > 1) {
		$array = [];
		for ($i = 1; $i < $argc; $i++) {
			$array = array_merge($array, preg_split("/[\s]+/", trim($argv[$i])));
		}
		usort($array, "compare");
		foreach($array as &$boop)
			echo $boop, PHP_EOL;
	}
?>