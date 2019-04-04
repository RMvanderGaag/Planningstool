<?php  
	include"dbConnect.php";
	$name = $_GET['name'];
	$conn = mysqli_connect($serverName, $username, $password, $dbName);
    $sql = "SELECT * FROM `games`WHERE name = $name";
    $query = mysqli_query($conn ,$sql);
   

?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title></title>
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
	<div class="container">
		<form action="send.php?id=<?php echo $id?>" method="post">
			<div class="form-group mt-4">
				<label>Voeg iemand toe die het spel gaat uitleggen</label>
				<input name="Uitlegger" class="form-control w-50" type="text" pattern="[^' ']+">
			</div>
			<div class="form-group mt-5">
				<label>Voeg de namen van de spelers toe</label>
				<?php 
				if($query){
					while($info = $query->fetch_assoc()){
						for($i = 1; $i <= $info[max_players] ; $i++){ ?>
						<input name="players" class="form-control w-50 mb-2" type="text" pattern="[^' ']+">
				<?php } } }?>
			</div>
			<div class="form-group mt-3">
				<label>Voeg de starttijd toe</label>
				<input class="form-control w-25" type="time" name="time">
			</div>

			<input class="btn btn-success mt-1" type="submit" name="submit">
		</form>
	</div>
</body>
</html>