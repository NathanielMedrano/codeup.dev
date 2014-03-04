<?php

require_once('classes/todo_class.php');

$filename = 'address_book.csv';

if (count($_FILES) > 0 && $_FILES['file1']['error'] == 0){
	if ($_FILES['file1']['type'] != 'text/csv') {
		$errorMsg = 'Invalid File type';
		echo $errorMsg;
	} else {
		$upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
		$new_file = basename($_FILES['file1']['name']);
		$saved_filename = $upload_dir . $new_file;
		move_uploaded_file($_FILES['file1']['tmp_name'], $saved_filename);

	    $newfile = new AddressData($saved_filename);

	    $addFile = $newfile->read_file();

	    if (isset($_POST['over1']) && $_POST['over1'] == TRUE){
	    	$address_book = $addFile;
	    }else{
			foreach ($addFile as $key => $item) {
	        	array_push($address_book, $addFile[$key]);
	    	}
		} 
    $book->save_file($address_book);    
    }
}

?>

<!DOCTYPE html>

<html>
<head>
	<title>Address book</title>
</head>
<body>

	<h2>Address Book</h2>

	<table>
			<? foreach ($address_book as $key => $row) { ?> 
				<tr>
					<?  if (!is_string($row)) {
                throw new Exception('Must be a string');
            } ?>
				<? foreach ($row as $entry => $value) { ?>
					 <?= "<td>" . htmlspecialchars(strip_tags($value))  .  "</td>"; } ?>
					<td> <a href='?remove=<?=$key ?>'>Remove Item</a></td>
				<? } ?>

				</tr>
	</table>
	
	<form method="POST" enctype="multipart/form-data" action="/address_book.php">
		<p>
			<label>Name: </label>
			<input type="text" name="name" id="name" >
		</p>
		<p>
			<label>Address: </label>
			<input type="text" name="address" id="address" >
		</p>
		<p>
			<label>City: </label>
			<input type="text" name="city" id="city" >
		</p>
		<p>
			<label>State: </label>
			<input type="text" name="state" id="state" >
		</p>
		<p>
			<label>Zip: </label>
			<input type="text" name="zip" id="zip" >
		</p>
		<p>
			<input type="submit" value="add" >
		</p>
		<p>
			<label for="file1">Add File:</label>
			<input type="file" id="file1" name="file1" >
		</p>
		<P>
			<input type="submit" value="Upload">
			<label><input type="checkbox" id="over1" name="over1" value="checked">Over Write</label>
		</P>

</body>
</html>