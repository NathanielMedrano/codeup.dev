<?php


// Get new instance of MySQLi object
$mysqli = @new mysqli('127.0.0.1', 'codeup', 'password', 'codeup_mysqli_test_db');

// Check for errors
if ($mysqli->connect_errno) {
    throw new Exception('Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Retrieve a result set using SELECT
if(empty($_GET)){
	$result = $mysqli->query("SELECT * FROM national_parks");
	while ($row[] = $result->fetch_array(MYSQLI_ASSOC)) {}
		array_pop($row);
} else {
	$result = $mysqli->query("SELECT * FROM national_parks ORDER BY {$_GET['sort_column']} {$_GET['sort_order']}");
	while ($row[] = $result->fetch_array(MYSQLI_ASSOC)) {}
		array_pop($row);
}

// Use print_r() to show rows using MYSQLI_ASSOC
?>
<!DOCTTYPE html>
<html>
<head>
	<title>National Parks</title>
	<style type="text/css">
	a {
		text-decoration: none;
		color: #000;
	}
	table,td {
		
		border: 1px solid #000;
	}
	table {
		border-spacing: 0px;
	}
	</style>
</head>
<body>
	<table>
		<tr class="row">
	    	<td><a>Name</a></td>
	   		<td><a>Location</a></td>
	   		<td><a>Description</a></td>
	    	<td><a>Date Established</a></td>
	   		<td><a>Acreage</a></td>
		</tr>	
<? foreach ($row as $key => $rows) { ?> 
        <tr>
	   		<td><?=$rows['name']?></td>
	   		<td><?=$rows['location']?></td>
	   		<td><?=$rows['description']?></td>
	   		<td><?=$rows['date_est']?></td>
	   		<td><?=$rows['area_acres']?></td>
		</tr>
	<?}?>
	</table>

	
  	

</body>
</html>