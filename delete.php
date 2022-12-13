<doctype! html>
<html>
<head>
	<title> Display Pets stored in the MySQL Table </title>
</head>
<body>
	<?php 
	 # Makes connection to the sql database
		$conn = mysqli_connect("localhost", "Helena", "hb333331", "user_database") # 1- localhost, 2.- username, 3- password, 4. - database name
			or die("Sorry couldn't connect to the database");
    # Selcecting all from the pets table and assigning it to the sql database
		$sql = 'SELECT * FROM pets';

		$query = mysqli_query($conn, $sql);
	
		echo "<h1> Select a pet to delete</h1>";
		echo "<table>
			<tr>
				
				<th>pet_ID</th>
				<th>pet_name</th>
				<th>pet_age</th>
				<th>pet_type</th>
                <th>Delete</th>
			</tr>";
		while ($row = mysqli_fetch_array($query))
		{ # Will output the information which is in th pet in in my sql database. 
			echo"
			<tr>
				<td>". $row['pet_ID'] . "</td>
				<td>". $row['pet_name']. "</td>
				<th>". $row['pet_age'] . "</td>
				<td>". $row['pet_type'] . "</td>
                <td><a href='Delete_a_pet.php?pet_ID=".$row['pet_ID']. "'> Delete </a></td>
			</tr>";
		
			
		}	
		# Closes the table tag 
		echo "</table>";

	?> 
</body>
</html>
