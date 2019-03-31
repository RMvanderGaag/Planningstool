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
				<li class="nav-item">
				    <a href="index.php" class="nav-link text-light active">Mijn spellen</a>
				</li>
				<li class="nav-item">
					<a href="addGame.php" class="nav-link text-light">Spellen toevoegen</a>
				</li>
			</ul>	
		</nav>

	<table class='table'>
    	<thead>
           	<th scope='col'>#</th>
        	<th scope='col'>Spelnaam</th>
        	<th scope='col'>Expansions</th>
        	<th scope='col'>Skills</th>
        	<th scope='col'>min speler</th>
        	<th scope='col'>max spelers</th>
        	<th scope='col'>Speel tijd</th>
        	<th scope='col'>Uitleg tijd</th>
        </thead>
        	<?php  
        		include"dbConnect.php";
        		$conn = mysqli_connect($serverName, $username, $password, $dbName);

        		if(isset($_GET[id])){
        			$id = $_GET[id];

        			$sql = "SELECT * FROM `games` WHERE id = $id";
    				$query = mysqli_query($conn ,$sql);

        			if($query){
        				while($obj = $query->fetch_object()){
        					echo "
								<tr>
									<td>" . $obj->id . "</td>
									<td>" . $obj->name . "</td>
									<td>" . $obj->expansions . "</td>
									<td>" . $obj->skills . "</td>
									<td>" . $obj->min_players . "</td>
									<td>" . $obj->max_players . "</td>
									<td>" . $obj->play_minutes . "</td>
									<td>" . $obj->explain_minutes . "</td>
									<td><a class='btn btn-danger'><i class='text-light fas fa-minus'></i></a></td>
								</tr>
        					";
        					
        				}
        			}
        		}


        	?>
	</table>
		

	
</body>
</html>

