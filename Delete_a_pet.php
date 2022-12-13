<doctype! html>
<html>
<head>
	<title>Pet Reord Deleted</title>
</head>
<body>
	<?php 
	 # Makes connection to the sql database
		$conn = mysqli_connect("localhost", "Helena", "hb333331", "user_database") # 1- localhost, 2.- username, 3- password, 4. - database name
			or die("Sorry couldn't connect to the database");

			$id = $_GET['pet_ID'];

			$sql = "DELETE FROM pets WHERE pet_ID='$id'";

			mysqli_query($conn, $sql);

			echo ' You have deleted a record ';
	?> 
</body>
</html>
