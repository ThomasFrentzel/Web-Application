<!DOCTYPE html>

<html>
	<head>
	  <title>Enterprise Software</title>
	  <link rel="icon" type="image/png" href="images/logocomp.png" />
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <link rel="stylesheet" href="css/customize.css">
	</head>
<body onload="w3_show_nav('menuClient')">
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
	<div class="w3-container w3-theme">
	<h2>Employee Deletion</h2>
	</div>

	<!-- Database Access-->
	<?php
				
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $database);

		// ID of the record to be deleted
		$id = $_POST['Id'];

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Perform DELETE in the Database
		$sql = "DELETE FROM Employee WHERE Id_Employee  = $id";

		echo "<div class='w3-responsive w3-card-4'>";
		if ($result = mysqli_query($conn, $sql)) {
			echo "<p>&nbsp;Record deleted successfully! </p>";
		} else {
			echo "<p>&nbsp;Error executing DELETE: " . mysqli_error($conn) . "</p>";
		}
        echo "</div>";
		mysqli_close($conn);  // Closes the connection to the DB

		?>
  	</div>
	</div>

</body>
</html>
