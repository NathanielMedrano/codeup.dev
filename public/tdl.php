
<?php

$basename = "/vagrant/sites/codeup.dev/public";

function addfile($alpha) {

    $handle = fopen($alpha, "r");
    $contents = fread($handle, filesize($alpha));
    $contents_array = explode("\n", $contents);
    // $result = array_merge($array, $contents_array);
    // $array = $result;
    fclose($handle);
    return $contents_array;


    }

    // $empty = array();
    $items = addfile("todo.txt");

function get_input($input) {
      
  
        return trim(fgets($input));
    
}


function save($array, $file) {

    if ($file) {
        $handle = fopen($file, 'w');

        foreach ($array as $key => $value) {
            fwrite($handle, PHP_EOL . $value);
        }    
    }

}
         


       if (isset($_POST['newitem']) && !empty($_POST['newitem'])) {
            $item = $_POST['newitem'];


            array_push($items, $item);

             save($items, "todo.txt");
             unset($_POST);
       }


         if (isset($_GET['remove'])) {

            $itemId = $_GET['remove'];
            unset($items[$itemId]);
            unset($_GET);
            // unset($_GET);
            //  header("Location: tdl.php");
            // exit(0);
            save($items, "todo.txt");
            var_dump($items);
         }

         if (count($_FILES) > 0 && $_FILES['file1']['error'] == 0) {
            // Set the destination directory for uploads
            //$upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
            // Grab the filename from the uploaded file by using basename
            $filename = basename($_FILES['file1']['name']);
            // Create the saved filename using the file's original name and our upload directory
            $saved_filename = $basename . $filename;
            // Move the file from the temp location to our uploads directory
            move_uploaded_file($_FILES['file1']['tmp_name'], $saved_filename);

            //var_dump($_FILES);

          // Check if we saved a file
        }
          if (isset($saved_filename)) {

              // If we did, show a link to the uploaded file
              echo "<p>You can download your file <a href='/uploads/{$filename}'>here</a>.</p>";
          }
?>

<!DOCTYPE html>

<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h2>TODO List</h2>

    <ul>
       <?php
                foreach ($items as $key =>$thing) { 
                  echo "<li>$thing <a href=\"?remove=$key\">Remove</a></li>";
                }


            
             //var_dump($items);
             
            


        ?>
    </ul>

<h2>Add Item</h2>
<form method="POST" action="">
    
        <input id="newitem" name="newitem" type="text">
        <input type="submit" value="add">
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