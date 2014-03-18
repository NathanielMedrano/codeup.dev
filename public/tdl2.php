<?php 

  // Get new instance of MySQLi object
  $mysqli = @new mysqli('127.0.0.1', 'codeup', 'password', 'codeup_mysqli_test_db');

  // Check for errors
  if ($mysqli->connect_errno) {
      throw new Exception('Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
  }

if (!empty($_POST)) {
 
  $sql="INSERT INTO todo (item)
  VALUES ('$_POST[item]')";

  if (!mysqli_query($mysqli,$sql))
    {
    die('Error: ' . mysqli_error($mysqli));
    }
  echo "1 record added";

  }
  
  if (isset($_GET['remove'])) {

    $stmt = $mysqli->prepare("DELETE FROM todo WHERE id = ?");

    $stmt->bind_param("i", $_GET['remove']);

    $stmt->execute();

  }

  $listitem = mysql_query("SELECT id, item FROM todo");

  mysqli_close($mysqli);



  class UnexpectedTypeException extends Exception{}

  class Conversation {

    // Property to hold name
    private $name = '';

    /**
     * Optional - allows name to be passed 
     * when the class is instantiated
     */
    public function __construct($name = '')
    {
        $this->set_name($name);
    }

    /**
     * Setter for $name
     * Filters and prepares $name
     */
     private function set_name($name) 
     {
         // Check if $name is a string
         if (!is_string($name)) {
            throw new UnexpectedTypeException('$name must be a string');
         }
         // Set the name property
         // Trim all leading and trailing whitespace 
         $this->name = trim($name);

     }

    /**
     * Return the name property in a descriptive string
     */
    public function get_name()
    {
        // return name with some fluff
        return "The name property on this instance of this class is '{$this->name}'";
    }

    /**
     * Method to say hello to name
     */
    public function say_hello($new_line = FALSE) 
    {
        // Set the greeting name
        $greeting = "Hello {$this->name}";

        // Return the greeting, checking for newline
        return $new_line == TRUE ? "$greeting\n" : $greeting;
    }

}


 function save_to_file($filename, $items) {
      $string = implode("\n", $items);
    $handle = fopen($filename, 'w');
    fwrite($handle, $string);
    fclose($handle);
    }

  function loadFile($filename){
    $handle = fopen($filename, 'r');
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    return explode("\n", $contents);

  }



    $filename = 'todo.txt';

    $handle = fopen($filename, 'r');
    $contents = fread($handle, filesize($filename));
    $items = explode("\n", $contents);
    fclose($handle);
    
 
  if (!empty($_POST["item"])){
    $item = $_POST["item"];

    // if (strlen($item) > 25) {
    //   throw new Exception ("Entry must be less than 25 characters");
    // }



    array_push($items, $item);
    save_to_file($filename, $items);
  }
  //remove
  if (isset($_GET['remove'])){
    unset($items[$_GET['remove']]);
    save_to_file($filename, $items);
    header("location: tdl2.php");
    exit;
  }

  // Verify there were uploaded files and no errors

      
      if (count($_FILES) > 0 && $_FILES['file1']['error'] == 0) {
      if ($_FILES['file1']['type'] == "text/plain") {
          // Set the destination directory for uploads
          $upload_dir = '/vagrant/sites/codeup.dev/public';
          // Grab the filename from the uploaded file by using basename
          $filename = basename($_FILES['file1']['name']);
          // Create the saved filename using the file's original name and our upload directory
          $saved_filename = $upload_dir . $filename;
          // Move the file from the temp location to our uploads directory
          move_uploaded_file($_FILES['file1']['tmp_name'], $saved_filename);

      if (isset($saved_filename)) {

          echo "<p>You can download your file <a href='/{$filename}'>here</a>.</p>";
      }

    } else {
      echo "File type is not text";
    }

    $new_items = loadFile($saved_filename);
    $items = array_merge($items, $new_items);

}



?>

<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="css/site.css">

<html>
<head>
  <title>Todo List</title>
</head>
<body>

  <h1>Things to do</h1>
  <ul>


    <?php 

    while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    printf("id: %s  item: %s", $row[0], $row[1]);  
    } 
?>
  </ul>
    <form method="POST">
      <input type="text" id="item" name="item" autofocus="autofocus" placeholder="add item">
      <input type="submit" value="add" >
    </form>
    <h2>Upload File</h2>

<form method="POST" enctype="multipart/form-data">
    <p>
        <label >File to upload: </label>
        <input type="file" id="file1" name="file1">
    </p>
    <p>
        <input type="submit" value="Upload">
    </p>
</form>


</body>
</html>