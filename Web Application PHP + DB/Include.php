<!DOCTYPE html>

<html>
	<head>
    <title>Enterprise Software</title>
    <link rel="icon" type="image/png" href="images/logocomp.png"/>
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
        <!-- h1 class="w3-xxlarge">Client Hiring</h1 -->
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
				// Set up to work with accented Portuguese characters
				mysqli_query($conn,"SET NAMES 'utf8'");
				mysqli_query($conn,'SET character_set_connection=utf8');
				mysqli_query($conn,'SET character_set_client=utf8');
				mysqli_query($conn,'SET character_set_results=utf8');

				// Select from the database
				$sqlG = "SELECT Id_Country, Country_name FROM Country";
				
				$options = array();
				
				if ($result = mysqli_query($conn, $sqlG)) {
					while ($row = mysqli_fetch_assoc($result)) {
                       array_push($options, "\t\t\t<option value='". $row["Id_Country"]."'>".$row["Country_name"]."</option>\n");
					}
				}

				?>

                <div class="w3-responsive w3-card-4">
                    <div class="w3-container w3-theme">
                        <h2>Enter the new Employee's data</h2>
                    </div>
                    <form class="w3-container" action="Include_exe.php" method="post" enctype="multipart/form-data">
					<table class='w3-table-all'>
					<tr>
                        <td style="width:50%;">
						<label class="w3-text-IE"><b>Name</b>*</label>
						<input class="w3-input w3-border w3-light-grey" name="Name" type="text" pattern="[a-zA-Z\u00C0-\u00FF ]{1,100}$"
							   title="Name between 1 and 100 characters." required></p>
						<p>
						<p>
						<label class="w3-text-IE"><b>Birth Date</b></label>
						<input class="w3-input w3-border w3-light-grey" name="BirthDate" type="date"
							   placeholder="dd/mm/yyyy" title="dd/mm/yyyy"</p>
						<p>
						<p><label class="w3-text-IE"><b>Nationality</b>*</label>
								<select name="Nationality" id="Nationality" class="w3-input w3-border w3-light-grey" required>
									<option value=""></option>
								<?php
									foreach($options as $key => $value){
										echo $value;
									}
								?>
								</select>
						</p>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center">
						<p>
						<input type="submit" value="Save" class="w3-btn w3-theme" >
						<input type="button" value="Cancel" class="w3-btn w3-theme" onclick="window.location.href='List.php'">
						</p>
						</td>
					</tr>
					</table>	
					</form>
					<br>
				</div>
			</div>
		</p>
	</div>

</body>
</html>
