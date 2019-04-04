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
           	<th scope='col'>#</th>
        	<th scope='col'>Spelnaam</th>
        	<th scope='col'>Uitlegger</th>
        	<th scope='col'>Begintijd</th>
        	<th scope='col'>Speeltijd</th>
        	<th scope='col'>Uitlegtijd</th>
        	<th></th>
        	<th></th>
        </thead>
        	<?php  
        		include"dbConnect.php";
        		$conn = mysqli_connect($serverName, $username, $password, $dbName);

        			$sql = "SELECT * FROM `activeGames`";
    				$query = mysqli_query($conn ,$sql);

    				$sql2 = "SELECT * FROM `planning`";
    				$query2 = mysqli_query($conn, $sql2);

    				$sql3 = "SELECT `activeGames`.id, `activeGames`.name, `planning`.uitlegger, `planning`.begin_time, `activeGames`.play_minutes, `activeGames`.explain_minutes FROM `activeGames` INNER JOIN `planning` WHERE `planning`.id = `activeGames`.id";
    				$query3 = mysqli_query($conn, $sql2);
    				$test = $query3->fetch_object();
    				


        			if($query OR $query2){
        				while($row = $query->fetch_object() OR $row2 = $query2->fetch_object()){
        					echo"
								<tr>
									<td>" . $row->id . "</a></td>
									<td><a class='text-dark' href='uitleg.php?id=".$row->id."'><ins>" . $row->name . "</ins></a></td>
									<td>" . $row2->uitlegger . "</td>
									<td>" . $row2->begin_time . "</td>
									<td>" . $row->play_minutes . "</td>
									<td>" . $row->explain_minutes . "</td>
									<td><a href='edit.php?id=".$row->id."' class='btn btn-warning'><i class='text-light fas fa-edit'></i></a></td>
									<td><a href='delete.php?id=".$row->id."' class='btn btn-danger'><i class='text-light fas fa-trash-alt'></i></a></td>
								</tr>
        					";	
        				}
        			}
        	?>
	</table>
		

	
</body>
</html>

