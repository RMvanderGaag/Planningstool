<?php 
	include"dbConnect.php";

	$id = $_GET[id];
    $sql = "SELECT * FROM games WHERE id = :id ";
    $query = $conn->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();
	$result = $query->fetchAll();
	
	$sql2 = "SELECT * FROM activeGames WHERE id = :id";
	$query2 = $conn->prepare($sql2);
    $query2->bindParam(":id", $id);
    $query2->execute();
	$result2 = $query2->fetchAll();

    foreach($result as $row){    
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Planningstool | UITLEG</title>
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
		<h1 class="text-center mt-2"><?php echo $row[name] ?></h1>
		<div class="row mt-5">
			<div class="col-4">
				<img class="w-50" src="afbeeldingen/<?php echo $row[image] ?> ">
			</div>
			<div class="col-8 mt-5">
				<?php echo $row[description] ?>
			</div>
		</div>
		<div class="row">
				<div class="col-6 mt-5">
					<?php echo $row[youtube] ?>
				</div>
				<div class="col-6 mt-5">
					<aside>
						<table class="table">
							<tbody>
								<tr>
									<th>Expansions</th>
									<td><?php echo $row[expansions] ?></td>
								</tr>
								<tr>
									<th>URL</th>
									<td><a href="<?php echo $row[url] ?>"><?php echo $row[url] ?></a></td>
								</tr>
								<tr>
									<th>Min spelers</th>
									<td><?php echo $row[min_players] ?></td>
								</tr>
								<tr>
									<th>Max spelers</th>
									<td><?php echo $row[max_players] ?></td>
								</tr>
								<tr>
									<th>Speeltijd</th>
									<td><?php echo $row[play_minutes] ?></td>
								</tr>
								<tr>
									<th>Uitlegtijd</th>
									<td><?php echo $row[explain_minutes] ?></td>
								</tr>
							</tbody>
						</table>
					</aside>
				</div>
		</div>
		<?php } foreach($result2 as $row2){ ?>
		<aside>
			<table class="table w-50">
				<tbody>
					<tr>
						<th>Uitlegger</th>
						<td><?php echo $row2[uitlegger] ?></td>
					</tr>
					<tr>
						<th>Starttijd</th>
						<td><?php echo $row2[begin_time] ?></td>
					</tr>
					<tr>
						<th>Spelers</th>
						<td><?php echo $row2[players] ?></td>
					</tr>
				</tbody>
			</table>
		</aside>
		
	</div>
</body>
</html>

		<?php } $conn = null ?>