<?php 
    include"stuff/dbConnect.php";

    $sql = "SELECT * FROM `activeGames` ORDER BY begin_time";
    $query = $conn->prepare($sql);
    $query->execute();

    $result = $query->fetchAll();
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Planningstool | HOME</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
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
	<table class='table table-striped'>
    	<thead>
        	<th scope='col'>Spelnaam</th>
        	<th scope='col'>Uitlegger</th>
        	<th scope='col'>Begintijd</th>
        	<th scope='col'>Speeltijd</th>
        	<th scope='col'>Uitlegtijd</th>
        	<th></th>
        	<th></th>
        </thead>
    <?php foreach ($result as $row){ ?>
	        	<tr>
	            	<td><a class='text-dark' href="uitleg.php?id=<?php echo $row[id] ?>&game_id=<?php $row[game_id] ?>"><ins><?php echo $row[name] ?></ins></a></td>
                    <td><?php echo $row[uitlegger] ?></td>
                    <td><?php echo $row[begin_time] ?></td>
	            	<td><?php echo $row[play_minutes] ?></td>
	            	<td><?php echo $row[explain_minutes] ?></td>
                    <td><a href='editUpdate.php?game_id=<? echo $row[game_id]?>' class='btn btn-warning'><i class='text-light fas fa-edit'></i></a></td>
					<td><a href='stuff/delete.php?game_id=<?=$row[game_id]?>' class='btn btn-danger' onclick="return isValid();"><i class='text-light fas fa-trash-alt'></i></a></td>
	        	</tr>
    <?php } ?>
</table>
<script>
	function isValid(){
		if(!confirm("Weet u zeker dat u de game wilt verwijderen?")){
			return false;
		}else{
			alert("De game is verwijderd");
			return true;
		}
	}
</script>
</body>
</html>

<?php $conn = null ?>