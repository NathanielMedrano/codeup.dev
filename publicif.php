<?php

$a = 5;
$b = 10;
$c = '10';

if ($a < $b) {
	//output the appropriate result
	echo "$a is less than $b\n";
}	else  {
	echo "$b is greater than $a\n";
}

if ($b >= $c) {
	echo "$b is greater than or equal to $c\n";
	}	else {
	echo "$b is equal to $c\n";
}

if ($b === $c) {
	echo "$b is absolutely equal to $c\n";
}	else {
	echo "$b is not equal to $c\n";
}
if ($b !== $c) {
	echo "$b is not identical to $c\n";
}

 ?>