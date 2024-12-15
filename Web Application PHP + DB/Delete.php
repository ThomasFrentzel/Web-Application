<!DOCTYPE html>

<html>
	<head>
    <title>Enterprise Software</title>
    <link rel="icon" type="image/png" href="images/logocomp.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="css/customize.css">
</head>
<body onload="w3_show_nav('menuEmployee')" >

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
	
				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $database);

				// Check connection
				if (!$conn) {
					die("<strong> Connection failed: </strong>" . mysqli_connect_error());
				}
				// Configure to work with Portuguese accented characters
				mysqli_query($conn,"SET NAMES 'utf8'");
				mysqli_query($conn,'SET character_set_connection=utf8');
				mysqli_query($conn,'SET character_set_client=utf8');
				mysqli_query($conn,'SET character_set_results=utf8');

				$id=$_GET['id'];
				
				// Select data from the Database
				$sql = "SELECT Id_Employee, Name, Country_name, Birth_date FROM Employee AS C ,Country AS P WHERE C.Id_Country = P.Id_Country AND Id_Employee = $id";
				// Start form DIV
				echo "<div class='w3-responsive w3-card-4'>";  
				 if ($result = mysqli_query($conn, $sql)) {
					if (mysqli_num_rows($result) == 1) {
						$row = mysqli_fetch_assoc($result);
						$dataN = explode('-', $row["Birth_date"]);
						$year = $dataN[0];
						$month = $dataN[1];
						$day = $dataN[2];
						$new_date = $day . '/' . $month . '/' . $year;
			?>
						<div class="w3-container w3-theme">
							<h2>Employee Deletion</h2>
						</div>
						<form class="w3-container" action="Delete_exe.php" method="post" onsubmit="return check(this.form)">
							<input type="hidden" id="Id" name="Id" value="<?php echo $row['Id_Employee']; ?>">
							<p>
							<label class="w3-text-IE"><b>Name: </b> <?php echo $row['Name']; ?> </label></p>
							<p>
							<label class="w3-text-IE"><b>Birth Date: </b><?php echo $new_date; ?></label></p>
							<p>
							<label class="w3-text-IE"><b>Nationality: </b><?php echo $row['Country_name']; ?></label></p>
							<p>
							<input type="submit" value="Confirm Deletion?" class="w3-btn w3-red" >
							<input type="button" value="Cancel" class="w3-btn w3-theme" onclick="window.location.href='List.php'"></p>
						</form>
			<?php 
					}else{?>
						<div class="w3-container w3-theme">
						<h2>Attempted deletion of a non-existent Employee</h2>
						</div>
						<br>
					<?php }
				}else {
					echo "<p style='text-align:center'>Error executing DELETE: " . mysqli_error($conn) . "</p>";
				}
				echo "</div>"; // End form
				mysqli_close($conn);  // Close the connection to the DB

			?>

			</div>
		</p>
	</div>

</body>
</html>
