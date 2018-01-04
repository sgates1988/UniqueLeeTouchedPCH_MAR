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
                PRN Documentation Form
            </h1>
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
                    <th>Time</th>
                    <th>Staff Signature</th>
                    <th>Drug - Strength - Dose</th>
                    <th>Reason Given</th>
                    <th>Response</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Staff Signature</th>
                </tr>

                <?php
                include('config.php');
                $res = $_GET['res'];

                $sql = "SELECT * FROM prn_records where res_name = '$res'";
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

                            echo "<td>";
                            echo $row['response'];
                            echo "</td>";


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
            <button id='prnEntry' class='button' onclick="prnModalOpen()" > New Entry </button></div>
        <div id="prnModal" class="modal" style="display:none" >
            <div class="modal-content">

                <span onclick="prnModalClose()" class="close">&times;</span>
                <h1>
                    New PRN Record
                </h1>
                <form>
                    <div class="container"> 
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
                        <input class="input" id="date" name="date" type="date">
                        </br>
                        <label>Time Medication Given:</label>
                        </br>
                        <select class="select">
                            <?php
                            include('config.php');

                            $sql = "SELECT * FROM time_slot";
                            $result = mysqli_query($con, $sql);

                            while ($row = $result->fetch_assoc()) {
                                $con->close();
                                ?>

                                <option id="time" name="time"value="<?php echo $row['time_slot_name'] ?>"><?php echo $row['time_slot_name']; ?></option>

                            <?php }
                            ?>
                        </select>
                        </br>
                        <label>Staff Signiture:</label>
                        </br>
                        <select class="select" disabled >
                            <option name="emp"  id="emp" value="<?php echo $_COOKIE['user'] ?>"><?php echo $_COOKIE['user'] ?></option>
                        </select>
                        </br>
                        <label>Drug-Strength-Dose:</label>
                        </br>
                        <input class="input" name="drug" id="drug" type="text">
                        </br>
                    </div>
                    <div class="container">
                        <label>Reason:</label>
                        </br>
                        <input class="input" name="reason" id="reason" type="text">
                        </br>
                        <label>Response:</label>
                        </br>
                        <input class="input" name="response" id="response" type="text">
                        </br>
                        <label>Response Date:</label>
                        </br>
                        <input  class="input" id="response_date" name="response_date" type="date">
                        </br>
                        <label>Response Time:</label>
                        </br>
                        <select class="select">
                            <?php
                            include('config.php');

                            $sql = "SELECT * FROM time_slot";
                            $result = mysqli_query($con, $sql);

                            while ($row = $result->fetch_assoc()) {
                                $con->close();
                                ?>

                                <option id="response_time" name="time"value="<?php echo $row['time_slot_name'] ?>"><?php echo $row['time_slot_name']; ?></option>

                            <?php }
                            ?>
                        </select>
                        </br>
                        <label>Staff Signiture for Response:</label>
                        </br>
                        <select class="select" disabled>
                            <option name="response_emp" id="response_emp" value="<?php echo $_COOKIE['user'] ?>"><?php echo $_COOKIE['user'] ?></option>
                        </select>
                        </br>
                    </div>
                </form>
                <button class="button" onclick="savePrnForm();return false;">Save</button>
            </div>
        </div>
    </div>
</body>
</html>
