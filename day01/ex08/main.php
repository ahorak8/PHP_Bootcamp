#!usr/bin/php
<?php

include("ft_is_sort.php");

$tab = array("1", "2", "7", "4", "5");

if(ft_is_sort($tab))
	echo "sorted";
else
	echo "not sorted";

?>