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
<!-- Includes MENU.PHP -->
<?php require 'general/menu.php';?>
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

	<!-- Database Access-->
	<?php
		$name    = $_POST['Name'];
		$dob     = $_POST['BirthDate'];
		$nationality  = $_POST['Nationality'];
		
		 
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $database);

		// Check connection
		if (!$conn) {
			die("<strong> Connection failed: </strong>" . mysqli_connect_error());
		}
		// Configure to work with accented Portuguese characters
		mysqli_query($conn,"SET NAMES 'utf8'");
		mysqli_query($conn,'SET character_set_connection=utf8');
		mysqli_query($conn,'SET character_set_client=utf8');
		mysqli_query($conn,'SET character_set_results=utf8');

		// Perform Insert in the Database
		$sql = "INSERT INTO Employee (Name, Birth_date, Id_Country) VALUES ('$name','$dob', '$nationality')";

		?>
		<div class='w3-responsive w3-card-4'>
		<div class="w3-container w3-theme">
		<h2>New Employee Registration</h2>
		</div>
		<?php
		if ($result = mysqli_query($conn, $sql)) {
			echo "<p>&nbsp;Record successfully registered! </p>";
		} else {
			echo "<p>&nbsp;Error executing INSERT: " . mysqli_error($conn) . "</p>";
		}
        echo "</div>";
		mysqli_close($conn);  // Close the connection to the DB

	?>
  </div>
</div>
	
</body>
</html>
