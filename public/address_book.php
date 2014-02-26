<?php

function csv($items) {
	$handle = fopen('add_book1.csv', 'a+');

	foreach ($items as $fields) {

		$fields = explode(' ', $fields);

	    fputcsv($handle, $fields);
	}

	fclose($handle);

}


$items = array();

$errors = array();

if (!empty($_POST["name"])){

    $item = htmlspecialchars(strip_tags($_POST["name"]));
    array_push($items, $item);
    //save_to_file($filename, $items);
  } 

if (!empty($_POST["address"])){
	
    $item = htmlspecialchars(strip_tags($_POST["address"]));
    array_push($items, $item);
    //save_to_file($filename, $items);
  } 

if (!empty($_POST["city"])){
	
    $item = htmlspecialchars(strip_tags($_POST["city"]));
    array_push($items, $item);
    //save_to_file($filename, $items);
  } 

if (!empty($_POST["zip"])){
	
    $item = htmlspecialchars(strip_tags($_POST["zip"]));
    array_push($items, $item);
    //save_to_file($filename, $items);
  } 

  if (!empty($_POST["phone"])){
	
    $item = htmlspecialchars(strip_tags($_POST["phone"]));
    array_push($items, $item);
    //save_to_file($filename, $items);
  } 

  

	csv($items);

?>

<html>
<head>
	<title>Address Book</title>
</head>
<body>

<h2>Address Info:</h2>
  <ul>


  </ul>

<form action="address_book.php" method="post">
Name: <input type="text" name="name" > <br>
Address: <input type="text" name="address"><br>
City: <input type="text" name="city"><br>
Zip: <input type="text" name="zip"><br>
Phone: <input type="text" name="phone"><br>
<input type="submit">
</form>

<table>
	<tr>
		<? foreach ($items as $fields => $value) :  ?>
	    <td><?= $value?></td>
		<? endforeach; ?>
	</tr>	
		
	

</table>

</body>
</html>