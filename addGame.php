<?php 
	include"dbConnect.php";
    $conn = mysqli_connect($serverName, $username, $password, $dbName);
    $sql = "SELECT * FROM `games`";
    $query = mysqli_query($conn ,$sql);

?>


<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Spel toevoegen</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
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

	<?php if ($query-> num_rows > 0) {?>
	<table class='table'>
    	<thead>
           	<th scope='col'>#</th>
        	<th scope='col'>Spelnaam</th>
        	<th scope='col'>Skills</th>
        	<th scope='col'>min spelers</th>
        	<th scope='col'>max spelers</th>
        	<th scope='col'>Speel tijd</th>
        	<th scope='col'>Uitleg tijd</th>
        	<th></th>
        </thead>
    <?php while($row = $query->fetch_assoc()){ ?>
	        	<tr>
	            	<td><?php echo $row[id] ?></td>
	            	<td><?php echo $row[name] ?></td>
	            	<td><?php echo $row[skills] ?></td>
	            	<td><?php echo $row[min_players] ?></td>
	            	<td><?php echo $row[max_players] ?></td>
	            	<td><?php echo $row[play_minutes] ?></td>
	            	<td><?php echo $row[explain_minutes] ?></td>
	            	<td>
	            		<?php 
	            			 echo '<a class="btn btn-success"  href="move.php?name='.$row[name].'" ><i class="text-light fas fa-plus"></i></a>';
	            		?>
	            	</td>
	        	</tr>
    <?php } ?>
</table>
	<?php }else{
    		echo "geen resultaat";

    	} ?>
</body>
</html>