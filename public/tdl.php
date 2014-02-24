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


?>

<html>
<head>
	<title>To-Do List</title>
</head>
<body>
	<h2>TODO List</h2>

	<ul>
	   <?php

         $things = addfile("todo.txt", $items);

             foreach ($items as $thing) {
                 echo "<li>$thing</li>";
             }


        ?>
	</ul>

	<h2>Things to do...</h2>
<form method="POST" action="">
    <p>
        <label for="errand">To-Do</label>
        <input id="errand" name="errand" type="text">
    </p>
</form>
<h2>Add file</h2>
<form method="POST" action="">
    <p>
        <label for="errand">To-Do</label>
        <input id="errand" name="errand" type="text">
    </p>
</form>
</body>
</html>