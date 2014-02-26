<?php 

$translate = "ellohay orldway";

$response = 'Y';

if ($response == 'Y') {
		//var_dump($translate);
		$arr = explode(' ', $translate);
		//var_dump($arr);
		$arr_str = $arr;
		//print_r($arr_str);
		
		

	foreach ($arr_str as $key => $value) {
		
		$space = " ";

		$ay = str_replace('ay', $space, $value);

		//$sub = str_replace($last, '', $value);
		
		echo $ay;
		}


	} else {
		echo "Oodgay Yebay!";
	}


?>