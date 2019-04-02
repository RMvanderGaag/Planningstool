<?php 
	include"dbConnect.php";
	$conn = mysqli_connect($serverName, $username, $password, $dbName);
	$id = $_GET[id];
	$sql="SELECT * FROM `activeGames` WHERE id = $id";
	$query=mysqli_query($conn, $sql);

	while($row = $query->fetch_object()){
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Uitleg</title>
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
	<div class="container">
		<h1 class="text-center mt-2"><?php echo $row->name ?></h1>
		<div class="row mt-5">
			<div class="col-4">
				<img src="afbeeldingen/<?php echo $row->image ?>">
			</div>
			<div class="col-8 mt-5">
				<?php echo $row->description ?>
			</div>
		</div>
		<div class="row">
				<div class="col-6 mt-5">
					<?php echo $row->youtube ?>
				</div>
				<div class="col-6 mt-5">
					<aside>
						<table class="table">
							<tbody>
								<tr>
									<th>Expansions</th>
									<td><?php echo $row->expansions ?></td>
								</tr>
								<tr>
									<th>URL</th>
									<td><a href="<?php echo $row->url ?>"><?php echo $row->url ?></a></td>
								</tr>
								<tr>
									<th>Min spelers</th>
									<td><?php echo $row->min_players ?></td>
								</tr>
								<tr>
									<th>Max spelers</th>
									<td><?php echo $row->max_players ?></td>
								</tr>
								<tr>
									<th>Speeltijd</th>
									<td><?php echo $row->play_minutes ?></td>
								</tr>
								<tr>
									<th>Uitlegtijd</th>
									<td><?php echo $row->explain_minutes ?></td>
								</tr>
							</tbody>
						</table>
					</aside>
				</div>
		</div>

		
	</div>
</body>
</html>

<?php } ?>