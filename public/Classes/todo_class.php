<?php

// class AddressData {

// 	public $filename = '';

// 	function __construct($filename = 'address_book.csv'){
// 		$this->filename = $filename;
// 	}

// 	function read_file() {
// 		$contents = [];
// 		$handle = fopen($this->filename, "r");
// 		while (($data = fgetcsv($handle)) !== FALSE) {
// 			$contents[] = $data;
// 		}
// 		fclose($handle);
// 		return $contents;
// 	}

// 	function save_file($address_book){
// 			$handle = fopen($this->filename, 'w');
// 			foreach ($address_book as $row) {
// 				fputcsv($handle, $row);
// 				}
// 			fclose($handle);
// 		}


// }


require_once('filestore.php');

class AddressData extends Filestore {

function book() {
	echo "test";
}

}

$book = new AddressData();

$address_book = $book->read_file();


$book->save_file($address_book);

$errorMessage =[];

if (!empty($_POST)){
	$entry =[];
	$entry['name'] = $_POST['name'];
	$entry['address'] = $_POST['address'];
	$entry['city'] = $_POST['city'];
	$entry['state'] = $_POST['state'];
	$entry['zip'] = $_POST['zip'];

	foreach ($entry as $key => $value){
		if (empty($value)) {
			array_push($errorMessage, "$key must have value.");
		}
	}
	if(empty($errorMessage)) {
	array_push($address_book, array_values($entry));
	$book->save_file($address_book);
	}
}

if (isset($_GET['remove'])){
	unset($address_book[$_GET['remove']]);
	$book->save_file($address_book);

}



?>