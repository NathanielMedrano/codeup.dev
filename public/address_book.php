<?php

 //In the same fashion as your todo.php application, you will want to display your entries at the top of the page, 
 //and have a form below for adding new entries. Each entry should take a name, address, city, state, zip, and phone. 
 //You can use a HTML table or definition lists for displaying the addresses.


//Open the CSV file in a spreadsheet program or text editor and verify the contents are what you expect after adding some entries.

//Refactor your code to use functions where applicable.

//Create a function to store a new entry. A new entry should have validate 5 required fields: name, address, city, state, 
//and zip. Display error if each is not filled out.

$items = array();

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

  
	$handle = fopen('add_book.csv', 'w');

	foreach ($items as $fields) {

		$fields = explode(' ', $fields);

		print_r($fields);
	    fputcsv($handle, $fields);
	}

	fclose($handle);



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
Name: <input type="text" name="name"><br>
Address: <input type="text" name="address"><br>
City: <input type="text" name="city"><br>
Zip: <input type="text" name="zip"><br>
Phone: <input type="text" name="phone"><br>
<input type="submit">
</form>

<?   var_dump($items); ?>

</body>
</html>