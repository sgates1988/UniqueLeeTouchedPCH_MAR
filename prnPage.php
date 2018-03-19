<html>
    <link href="css/mar.css" rel="stylesheet" type="text/css"/>
    <script src="js/all.js" type="text/javascript"></script>
    <head>
        <meta charset="UTF-8">
        <title>PRN Form</title>
    </head>
    <body>
        <div>
            <h1>
                PRN Records
            </h1>
            <strong style="text-align: center">Displaying Search Results For: </strong>
            <p style="color: red"><?php
                $resident = $_GET['res'];
                $med = $_GET['med'];
                date_default_timezone_set("America/New_York");
                $time = date("h:i");
                $date = date("Y-m-d");
                
                echo 'Resident: ' . $resident;
                echo '<br> Medication: ' . $med;
                ?>
            </p>
            <p>
                "PRN Medication" (pro re nata) means any nonprescription or prescription medication that is to be taken as needed as oppose to "routine" medication that are taken on a regular schedule (e.g. every morning , or twice a day).
                Complete all boxes in the graph below. The first line is an given example. Wait 30-60 minutes before documenting the response. 
            </p>
        </div>
        <div>
            <table>
                <tr>
                    <th>Resident Name</th>
                    <th>Date</th>
                    <th>Time Given</th>
                    <th>Staff Signature</th>
                    <th>Drug - Strength - Dose</th>
                    <th>Reason Given</th>
                    <th>Response</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Staff Signature</th>
                </tr>
                <div style="display: none">
                    <input type="text" id="med" value="<?php echo $med ?>">
                </div>
                <?php
                include('config.php');
                $res = $_GET['res'];
                $med = $_GET['med'];
                $sql = "SELECT * FROM prn_records where res_name = '$res' AND drug_strgth_dose = '" . $med . "'";
                $result = mysqli_query($con, $sql);



                if ($result == false) {
                    echo "No results Found";
                } else {
                    $count = mysqli_num_rows($result);
                    while ($row = $result->fetch_assoc()) {
                        $i = 0;
                        if ($i <= $count) {
                            echo "<tr>";
                            echo "<td>";
                            echo $row['res_name'];
                            echo "</td>";

                            echo "<td>";
                            echo $row['date'];
                            echo "</td>";

                            echo "<td>";
                            echo $row['time'];
                            echo "</td>";

                            echo "<td>";
                            echo $row['emp_name'];
                            echo "</td>";

                            echo "<td>";
                            echo $row['drug_strgth_dose'];
                            echo "</td>";


                            echo "<td>";
                            echo $row['reason'];
                            echo "</td>";

                            if ($row['response'] == '') {
                                echo "<td>";
                                ?>
                                <button  id="add" onclick="prnResponseModalOpen(this.value)" value="<?php echo $row['prn_records_id'] ?>" >Add Response</button>
                                <?php
                                echo "</td>";
                            } else {
                                echo "<td>";
                                echo $row['response'];
                                echo "</td>";
                            }


                            echo "<td>";
                            echo $row['response_date'];
                            echo "</td>";

                            echo "<td>";
                            echo $row['response_time'];
                            echo "</td>";

                            echo "<td>";
                            echo $row['response_emp_name'];
                            echo "</td>";

                            echo "</tr>";
                            $i = $i + 1;
                        }
                    }
                    ?>

                    <?php
                }
                ?>
            </table>
            <button id='prnEntry' class='button' onclick="prnModalOpen(document.getElementById('med').value)" > New Entry </button></div>
        <div id="prnModal" class="modal" style="display:none" >
            <div class="modal-content">

                <span onclick="prnModalClose()" class="close">&times;</span>
                <h3>
                    New PRN Record
                </h3>
                <form>
                    <div style="padding-left: 20px"> 
                        <label>Resident Name:</label>
                        </br>
                        <?php
                        include('config.php');

                        $sql = "SELECT * FROM residents where res_name = '$res'";
                        $result = mysqli_query($con, $sql);

                        while ($row = $result->fetch_assoc()) {
                            $con->close();
                            ?>

                            <option class="select" name="residents" id="residents" disabled value="<?php echo $row['res_name'] ?>"><?php echo $row['res_name']; ?></option>

                        <?php }
                        ?>

                        </br>
                        <label> Date Medication Given:</label>
                        </br>
                        <input class="input" id="date" required name="date" type="date" value="<?php echo $date ?>">
                        </br>
                        <label>Time Medication Given:</label>
                        </br>
                        <input type="time" required id="time" value="<?php echo $time ?>">
                        </br>
                        <label>Staff Signiture:</label>
                        </br>
                        <select class="select" required disabled >
                            <option name="emp"  id="emp" value="<?php echo $_COOKIE['user'] ?>"><?php echo $_COOKIE['user'] ?></option>
                        </select>
                        </br>
                        <label>Medication-Strength-Dose:</label>
                        </br>
                        <input class="input" required disabled name="drug" id="drug" type="text" value="<?php echo $med ?>">
                        </br>
                        <label>Reason:</label>
                        </br>
                        <input class="input" required name="reason" id="reason" type="text">
                        </br>
                        <p id="error" name="error" class="error" ></p>
                        </form>
                        <button class="button" onclick="savePrnForm();return false;">Save</button>
                    </div>
            </div>
        </div>
    </body>
</html>
