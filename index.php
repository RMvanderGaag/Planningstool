<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Planningstool</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-md bg-info">
		<ul class="navbar-nav">
			<li class="nav-item mr-2">
				<a href="index.php" class="nav-link text-light active">Mijn spellen</a>
			</li>
			<li class="nav-item">
				<a href="addGame.php" class="nav-link text-light">Spellen toevoegen</a>
			</li>
		</ul>	
	</nav>

	<table class='table'>
    	<thead>
        	<th scope='col'>Spelnaam</th>
        	<th scope='col'>Uitlegger</th>
        	<th scope='col'>Begintijd</th>
        	<th scope='col'>Speeltijd</th>
        	<th scope='col'>Uitlegtijd</th>
        	<th></th>
        	<th></th>
        </thead>
        	<?php  
        		include"Database/dbConnect.php";
        		$conn = mysqli_connect($serverName, $username, $password, $dbName);
        			
        		
        			$sql = "SELECT * FROM `activeGames` ORDER BY begin_time";
    				$query = mysqli_query($conn ,$sql);

        			if($query){
        				while($row = $query->fetch_object()){
        					echo"
								<tr>
									<td><a class='text-dark' href='uitleg.php?id=".$row->id."&game_id=".$row->game_id."'><ins>" . $row->name . "</ins></a></td>
									<td>" . $row->uitlegger . "</td>
									<td>" . $row->begin_time . "</td>
									<td>" . $row->play_minutes . "</td>
									<td>" . $row->explain_minutes . "</td>
									<td><a href='edit.php?game_id=".$row->game_id."' class='btn btn-warning'><i class='text-light fas fa-edit'></i></a></td>
									<td><a href='sendThrough/delete.php?game_id=".$row->game_id."' class='btn btn-danger'><i class='text-light fas fa-trash-alt'></i></a></td>
								</tr>
        					";	
        				}
        			}
        	?>
	</table>
		

	
</body>
</html>

