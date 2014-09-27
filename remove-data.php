<?php
	
	//include database file
	require('db.php');

	//check whether request has been made
	if(isset($_SERVER['REQUEST_METHOD'])){	

		//get data via ajax
		$remove = $_POST['remove'];

		//open database connection
		$dbc = mysqli_connect('localhost', 'root', 'password', 'task_list') or die('Connection failed');

		//delete element where id corresponds to received id
		$query = "DELETE FROM tasks WHERE id = '$remove'";
		mysqli_query($dbc, $query);

		//close database connection
		mysqli_close($dbc);

	}
