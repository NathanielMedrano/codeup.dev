<!DOCTYPE html>

<html>
<head>
	<title>To-Do List</title>
</head>
<body>
	<h2>TODO List</h2>

	<ul>
	   <?php

        $things = ['mow the lawn', 'wash dishes' ];

            foreach ($things as $thing) {
                echo "<li>$thing</li>";
            }

        }


        ?>
	</ul>

 
	<h2>Things to do...</h2>
<form method="POST" action="">
    <p>
        <label for="errand">To-Do</label>
    </p>
    <p>
        <input id="errand" name="errand" type="text">
    </p>
     <p>
        <!--<input name="submit" value="login" type="submit"> -->
        <button type="submit">Submit</button>
    </p>
</form>
</body>
</html>