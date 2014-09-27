<?php
	
	//include database file
	require('db.php');

	//check whether request has been made
	if(isset($_SERVER['REQUEST_METHOD'])){	

		//get data via ajax
		$task = mysqli_real_escape_string($dbc, $_POST['task']);
		$dueDate = $_POST['dueDate'];
		$urgency = $_POST['urgency'];
			
		//insert into database
		$query = "INSERT INTO tasks(task, dueDate, urgency) VALUES('$task', '$dueDate','$urgency')";
		mysqli_query($dbc, $query);
	
		//get all current tasks ordered by their due date
		$query = "SELECT * FROM tasks ORDER BY dueDate";
		$result = mysqli_query($dbc, $query);
		$data = [];
		while($row = mysqli_fetch_object($result)){
			$data[] = $row;
		}

		//echo json of the data
		echo '{"tasks": ' . json_encode($data) . '}';

		//close database connection
		mysqli_close($dbc);		
	
	}
