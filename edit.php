<?php 
    include"stuff/dbConnect.php";
	$max_players = $_GET[max_players];
    $id = $_GET[game_id];
	session_start();
	$sessionId = $_SESSION[id];
    $sql = "SELECT * FROM `games` WHERE id = ':sessionId'";
    $query = $conn->prepare($sql);
    $query->bindParam(":id", $id);
	$query->execute();
	
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Planningstool | EDIT</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-md bg-info">
		<ul class="navbar-nav">
			<li class="nav-item mr-2">
				<a href="" onclick="alert('Vul het formulier in!')" class="nav-link text-light active">Mijn spellen</a>
			</li>
			<li class="nav-item">
				<a href="" onclick="alert('Vul het formulier in!')" class="nav-link text-light">Spellen toevoegen</a>
			</li>
		</ul>	
	</nav>
	<div class="container">
		<form action="stuff/send.php?id=<?php echo $id?>" method="post">
			<div class="form-group mt-4">
				<label>Voeg iemand toe die het spel gaat uitleggen</label>
				<input name="Uitlegger" class="form-control w-50" type="text" pattern="[^' ']+" required>
			</div>
			<div class="form-group mt-5">
				<label>Voeg de namen van de spelers toe</label>
				<?php 
						for($i = 1; $i <= $max_players ; $i++){ 
							?>
							<input name="players[]" class="form-control w-50 mb-2" type="text" pattern="[^' ']+">
				<?php }  ?>
			</div>
			<div class="form-group mt-3">
				<label>Voeg de starttijd toe</label>
				<input class="form-control w-25" type="time" name="time" required>
			</div>

			<input class="btn btn-success mt-1" type="submit" name="submit" value="Toevoegen" onclick="addGameAlert()">
		</form>
	</div>
	<script>
		function addGameAlert() {
			alert("Je hebt een spel toegevoegd");
		}
	</script>
</body>
</html>