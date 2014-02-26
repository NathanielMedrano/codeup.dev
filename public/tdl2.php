<?php 
     
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
    
 
  if (!empty($_POST["newitem"])){
    $item = $_POST["newitem"];
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

// Check if we saved a file

?>

<!DOCTYPE html>

<html>
<head>
  <title>TODO List</title>
</head>
<body>

  <h2>TODO List</h2>
  <ul>


<? foreach ($items as $item): ?>
    <li><?= htmlspecialchars(strip_tags($item)); ?></li>
<? endforeach; ?>

    <?php foreach ($items as $key => $item) {

      $newTodo = $key + 1;
      echo "<li>$item <a href='?remove=$key'>Remove Item</a></li>";
} 
?>
  </ul>
    <form method="POST">
      <input type="text" id="newitem" name="newitem" autofocus="autofocus" placeholder="add item">
      <input type="submit" value="add" >
    </form>
    <h1>Upload File</h1>

<form method="POST" enctype="multipart/form-data">
    <p>
        <label for="file1">File to upload: </label>
        <input type="file" id="file1" name="file1">
    </p>
    <p>
        <input type="submit" value="Upload">
    </p>
</form>
</body>
</html>