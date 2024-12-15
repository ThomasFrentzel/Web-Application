<!DOCTYPE html>

<html>
	<head>
	  <title>Enterprise Software</title>
	  <link rel="icon" type="image/png" href="images/logocomp.png" />
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <link rel="stylesheet" href="css/customize.css">
	</head>
	<body onload="w3_show_nav('menuEmployee')">

	<?php require 'general/menu.php'; ?>
	<?php require 'db/connectDB.php'; ?>
	
	<!-- Main Content: shifted to the right by 270 pixels when the sidebar is visible -->
	<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

	<div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">

	  <p class="w3-large">
	  <div class="w3-code cssHigh notranslate">
	  <!-- Accessed on:-->
		<?php

		date_default_timezone_set("America/Sao_Paulo");
		$data = date("d/m/Y H:i:s", time());
		echo "<p class='w3-small' > ";
		echo "Accessed on: ";
		echo $data;
		echo "</p> "
		?>
		<div class="w3-container w3-theme">
		<h2>Employee Information Update</h2>
		</div>
		<!-- Database Access-->
		<?php
			// Receives the data filled in the form, with the values to be updated
			$id      = $_POST['Id'];
			$name    = $_POST['Name'];
			$dob     = $_POST['Birth_date'];
			$nationality = $_POST['Nationality'];

			// Creates connection
			$conn = mysqli_connect($servername, $username, $password, $database);

			// Checks connection
			if (!$conn) {
				die("<strong> Connection failed: </strong>" . mysqli_connect_error());
			}
			
			// Configures for handling accented characters in Portuguese
			mysqli_query($conn,"SET NAMES 'utf8'");
			mysqli_query($conn,'SET character_set_connection=utf8');
			mysqli_query($conn,'SET character_set_client=utf8');
			mysqli_query($conn,'SET character_set_results=utf8');
			?>
			
			<?php
		
			// Performs Update in the Database
				$sql = "UPDATE Employee SET Name = '$name' ,  Birth_date = '$dob', Id_Country = $nationality WHERE Id_Employee = $id";
			echo "<div class='w3-responsive w3-card-4'>";
			if ($result = mysqli_query($conn, $sql)) {
				echo "<p>&nbsp;Record updated successfully! </p>";
			} else {
				echo "<p>&nbsp;Error executing UPDATE: " . mysqli_error($conn) . "</p>";
			}
			echo "</div>";
			mysqli_close($conn); // Closes the database connection

		?>
	  </div>
	</div>

</body>
</html>
