<?php
        include"dbConnect.php";
        $conn = mysqli_connect($serverName, $username, $password, $dbName);


        $sql = "SELECT * FROM `games`";
    	$query = mysqli_query($conn ,$sql);


    	if ($query-> num_rows > 0) {
    		echo "<table class='table'>
        		<thead>
                    <th scope='col'>#</th>
        			<th scope='col'>Spelnaam</th>
        			<th scope='col'>Expansions</th>
        			<th scope='col'>Skills</th>
        			<th scope='col'>min speler</th>
        			<th scope='col'>max spelers</th>
        			<th scope='col'>Speel tijd</th>
        			<th scope='col'>Uitleg tijd</th>
        		</thead>";

    		while($row = $query->fetch_assoc()){
    		  echo 
                "
                <form method='POST'>
                    <tr>
                        <td>" . $row[id] . "</td>
            			<td>
            				<a href='uitleg.php'>" . $row[name] . "</a>
            			</td>
            			<td>" . $row[expansions] . "</td>
            			<td>" . $row[skills] . "</td>
            			<td>" . $row[min_players] . "</td>
            			<td>" . $row[max_players] . "</td>
            			<td>" . $row[play_minutes] . "</td>
            			<td>" . $row[explain_minutes] . "</td>
            			<td>
            		      <input class='btn btn-success' type='submit' name='submit' value='Toevoegen'>
            			</td>
            		</tr>
                </form>"
                ;
        }
            echo "</table>";

    	}else{
    		echo "geen resultaat";

    	}