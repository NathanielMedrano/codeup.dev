<?php

$errorMessage = null;
$successMessage = null;
 
// connect to the db
$mysqli = new mysqli('127.0.0.1', 'codeup', 'password', 'codeup_mysqli_test_db');
 
// Check for errors
if ($mysqli->connect_errno)
{
    throw new Exception('Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
 
if (!empty($_POST))
{
  // check for new address
  if (isset($_POST['address']))
  {
    if ($_POST['address'] != "")
    {
      $address = substr($_POST['address'], 0, 200);
 
      // add to db
      $stmt = $mysqli->prepare("INSERT INTO addresses (item) VALUES (?);");
      $stmt->bind_param("s", $address);
      $stmt->execute();
 
      $successMessage = "Address was added successfully.";
    }
    else
    {
      // show error message
      $errorMessage = "Please input a address.";
    }
  }
  else if (!empty($_POST['remove']))
  {
    // remove item from db
    $stmt = $mysqli->prepare("DELETE FROM addresses WHERE id = ?;");
    $stmt->bind_param("i", $_POST['remove']);
    $stmt->execute();
 
    $successMessage = "Address was removed successfully.";
  }
}
 
$todos = $mysqli->query("SELECT * FROM addresses");
 

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

</body>
</html>