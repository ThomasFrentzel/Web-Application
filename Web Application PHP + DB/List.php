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
        <?php require 'general/menu.php'; ?>
        <?php require 'db/connectDB.php'; ?>

        <div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">
            <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
                <p class="w3-large">
                    <p>
                    <div class="w3-code cssHigh notranslate">
                        <?php
                            date_default_timezone_set("America/Sao_Paulo");
                            $data = date("d/m/Y H:i:s", time());
                            echo "<p class='w3-small' > ";
                            echo "Accessed on: ";
                            echo $data;
                            echo "</p>";
                        ?>
                        <div class="w3-container w3-theme">
                            <h2> List of Employees</h2>
                        </div>
                        <?php
                            $conn = mysqli_connect($servername, $username, $password, $database);
                            
                            if (!$conn) {
                                echo "</table>";
                                echo "</div>";
                                die("Database connection failed: " . mysqli_connect_error());
                            }
                            
                            mysqli_query($conn, "SET NAMES 'utf8'");
                            mysqli_query($conn, 'SET character_set_connection=utf8');
                            mysqli_query($conn, 'SET character_set_client=utf8');
                            mysqli_query($conn, 'SET character_set_results=utf8');

                            $sql = "SELECT Id_Employee, Name, P.Country_name, Birth_date FROM Employee AS C, Country AS P WHERE C.Id_Country = P.Id_Country";
                            
                            echo "<div class='w3-responsive w3-card-4'>";
                            if ($result = mysqli_query($conn, $sql)) {
                                echo "<table class='w3-table-all'>";
                                echo "  <tr>";
                                echo "    <th width='14%'>Employee ID</th>";
                                echo "    <th width='18%'>Name</th>";
                                echo "    <th width='15%'>Nationality</th>";
                                echo "    <th width='10%'>Birth Date</th>";
                                echo "    <th width='10%'>Age</th>";
                                echo "    <th width='7%'>Edit</th>";
                                echo "    <th width='14%'>Delete</th>";
                                echo "    <th width='7%'> </th>";
                                echo "    <th width='7%'> </th>";
                                echo "  </tr>";
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $data = $row['Birth_date'];  // Make sure 'Birth_date' is correct
                                        list($year, $month, $day) = explode('-', $data);
                                        $new_date = $day . '/' . $month . '/' . $year;
                                        $today = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                                        $birth = mktime(0, 0, 0, $month, $day, $year);
                                        $age = floor((((($today - $birth) / 60) / 60) / 24) / 365.25);
                                        $id = $row["Id_Employee"];  // Make sure 'Id_Employee' is correct
                                        echo "<tr>";
                                        echo "<td>" . $id . "</td>";
                                        echo "<td>" . $row["Name"] . "</td>";
                                        echo "<td>" . $row["Country_name"] . "</td>";
                                        echo "<td>" . $new_date . "</td>";
                                        echo "<td>" . $age . "</td>";
                        ?>
                                        <td>
                                            <a href='Update.php?id=<?php echo $id; ?>'><img src='imagens/Edit.png' title='Edit Client' width='32'></a>
                                        </td>
                                        <td>
                                            <a href='Delete.php?id=<?php echo $id; ?>'><img src='imagens/Delete.png' title='Delete Client' width='32'></a>
                                        </td>
                                        </tr>
                        <?php
                                    }
                                }
                                echo "</table>";
                                echo "</div>";
                            } else {
                                echo "Error executing SELECT: " . mysqli_error($conn);
                            }

                            mysqli_close($conn);
                        ?>
                    </div>
                </p>
            </div>

            <?php require 'general/about.php'; ?>
        </div>

        <?php require 'general/footer.php'; ?>
    </body>
</html>
