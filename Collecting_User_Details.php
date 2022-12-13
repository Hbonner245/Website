<doctype! html>
<html>
<head>
	<title> Login System </title>
</head>
<body>

	<?php 
		# making the conenction to the database
		$conn = mysqli_connect("localhost", "Helena", "hb333331", "user_database") # 1- localhost, 2.- username, 3- password, 4. - database name
			# if the the data above is not correct the it will output to the user that it cannot connect to the database
			or die("Sorry couldn't connect to the database");#
			# Making a username database and posting the username for the html and saving it 
			$Username = $_POST['Username'];
			# Making a username database and posting the username for the html and saving it 
			$Password = $_POST['Password'];
			# making a variable called rows. Then we are starting to make a quary. Line 1 of the quary is saying select wildcard form the admin table.
			# Line  one of the query is a linking to the database and selecting all the data from admin database.
			# Line two lookiing in the admin table to see if the username the user has entered is equal to a username in the database
			# Line 3 is also seeing if the password is correct and will then log in. 
			$level1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin_table 
														WHERE Username = '$Username'
														AND Password = '$Password'
														AND Access_Level = 1"));

			$level2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin_table 
															WHERE Username = '$Username'
															AND Password = '$Password'
															AND Access_Level = 2"));

			if ($level1 >0){
				# starts the session
				session_start();
				# If the username and level is equal to one it will take then the the regular user html page 
				$_SESSION['User'] = $Username;
				$_SESSION['level'] = 1;
				# Telling the code which file to open 
				header("location: RegularUserHP.html");
			}
			else if ($level2 > 0){
				session_start();
				# Will see if the username and see what level it is equal to. If the level is equal to 2 tehen it will take them to te admimUserHp page
				$_SESSION['User'] = $Username;
				$_SESSION['level'] = 2;
				# Location of the html file. that the user is taken to once they have successfully log in. in this isnstance if the username and password is correct for the admin it will take them to the home page for the admin.
				header("location: AdminUserHP.html");
			}

			else 
			{
				# If the user has incorrectly inputted their username and password the are incorrect
				echo "Your username and/or password is incorrect.";
			}
	?> 
</body>
</html>
