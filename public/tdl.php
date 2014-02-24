<!DOCTYPE html>

<?php

$items = array();

function addfile($alpha, &$array) {

    $handle = fopen($alpha, "r");
    $contents = fread($handle, filesize($alpha));
    $contents_array = explode("\n", $contents);
    $result = array_merge($array, $contents_array);
    $array = $result;
    fclose($handle);
    return $array;


    }

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


       if (isset($_POST['newitem'])) {
            $item = $_POST['newitem'];


            array_push($items, $item);
       }

        //$fn = $_POST;

         $things = addfile("todo.txt", $items);

         if (isset($_GET['remove'])) {

            $itemId = $_GET['remove'];
            unset($items[$itemId]);

             save($items, "todo.txt");
         }
?>

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





        ?>
    </ul>

<h2>Add file</h2>
<form method="POST" action="">
    
        <input id="newitem" name="newitem" type="text">
        <input type="submit" value="add">
</form>
</body>
</html>