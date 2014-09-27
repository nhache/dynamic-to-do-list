<?php

	//define database parameters
	$host = 'localhost';
	$root = 'root';
	$password = 'password';
	$database = 'task_list';

	//open database connection
	$dbc = mysqli_connect($host, $root, $password, $database) or die('Database connection failed');
