<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dynamic to-do-list</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/global.css">
	</head>
	<body>

		<div class="container">

			<div class="row">			
				<div class="page-header">
					<h1>Dynamic to-do-list <small>(Fully responsive)</small></h1>
				</div>	
					<p class=" side-border">Built using <strong>PHP</strong> and <strong>jQuery</strong> and designed with 
						<a href="http://getbootstrap.com/">Bootstrap</a>. Use this page to dynamically display, add info to and delete 
						from your to-do-list. All database interaction is handled via <strong>AJAX</strong>, using the <strong>JSON</strong> data format. 
						Your to-do's are always sorted by the respective due date.<br><br>&copy; 2014 Niklas Hache. Licensed under 
						<a href="http://opensource.org/licenses/MIT">MIT</a>.</p>
			</div>

			<div id="dynamic-table" class="row">
				<div class="col-md-4" >	
					<div class="panel panel-default">
  						<div class="panel-heading">Add to your to-do-list</div>
  							<div class="panel-body">
								<form id="input-form">
									<label for="task">Task</label>
									<input type="text" class="form-control" id="task" name="task" placeholder="Enter task"><br>
									<label for="task">Due date</label>
									<input type="date" class="form-control" id="dueDate" name="dueDate"><br>
									<label for="task" >Urgency</label>
									<select id="urgency" class="form-control" name="urgency">
										<option val="low">Low</option>
										<option val="average">Average</option>
										<option val="high">High</option>
									</select><br>
									<button type="submit" class="btn btn-success submit">
					  					<span class="glyphicon glyphicon-list-alt"></span> Add
									</button>
								</form>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<h2>Your current to-do's</h2>
					<table id="task-table" class="table table-hover">
						<thead>
							<tr>
								<th>Task</th>
								<th>Due date</th>
								<th>Urgency</th>
								<th class="center">Delete</th>
							</tr>
						</thead>
						<tbody>
						<?php
							//include database file
							require('db.php');
							//get and display current data
							$query = "SELECT * FROM tasks ORDER BY dueDate";
							$result = mysqli_query($dbc, $query);
							foreach($result as $row){
								echo '<tr id="' . $row['id'] . '">';
									echo '<td>' . $row['task'] . '</td>';
									echo '<td>' . $row['dueDate'] . '</td>';
									echo '<td class="urgency">' . $row['urgency'] . '</td>';
									echo '<td class="center"><a href="#"><span class="glyphicon glyphicon-trash"></span></a></td>';
								echo '</tr>';
							}
						?>
						</tbody>
					</table>
				</div>	
			</div>

		</div>	

		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/dynamic-table.js"></script>	
	</body>
</html>
