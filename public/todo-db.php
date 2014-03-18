<?php
 
var_dump($_GET);
 
var_dump($_POST);
 
// connect to the db
$mysqli = new mysqli('127.0.0.1', 'codeup', 'password', 'codeup_mysqli_test_db');
 
// Check for errors
if ($mysqli->connect_errno) {
    throw new Exception('Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

if (!empty($_POST))
{

	if ($_POST['todo']))
	{
		if ($_POST['todo'] != "")
		{
			//add to db
		}	else
		{
			//show err
		}	
	}
	elseif (!empty($_POST['remove'])) {
		//remove item from db
	}

} 
$todos = $mysqli->query("SELECT * FROM todos");
 
?>
<html>
<head>
	<title>Todo List</title>
 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
 
	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
 
	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
 
	<h1>Todo List</h1>
 
	<table class="table table-striped">
	<? while ($todo = $todos->fetch_assoc()): ?>
		<tr>
			<td><?= $todo['item']; ?></td>
			<td><button class="btn btn-danger btn-sm pull-right" onclick="removeById(<?= $todo['id']; ?>)">Remove</button></td>
		</tr>
	<? endwhile; ?>
	</table>
 
	<h2>Add Items</h2>
	<form class="form-inline" role="form" action="todo-db.php" method="POST">
		<div class="form-group">
			<label class="sr-only" for="exampleInputEmail2">Todo Item</label>
			<input type="text" name="todo" class="form-control" placeholder="Enter todo item">
		</div>
		<button type="submit" class="btn btn-default">Add Todo</button>
	</form>
 
</div>
 
<form id="removeForm" action="todo-db.php" method="post">
	<input id="removeId" type="hidden" name="remove" value="">
</form>
 
<script>
	
	var form = document.getElementById('removeForm');
	var removeId = document.getElementById('removeId');
 
	function removeById(id) {
		removeId.value = id;
		form.submit();
	}
 
</script>
 
</body>
</html>