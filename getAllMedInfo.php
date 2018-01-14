<html>
    <head>
        <script src="js/all.js" type="text/javascript"></script>
    </head>
    <body onunload="getyy()">
        <?php
        $user = $_COOKIE['user'];
        $currentDate = date("Y-m-d");
        $dateSimple = date("m-d-Y");
        $res = ($_GET['res']);
        ?>
        <div id="info" style="display: none">
            <input type="button" id="res_name" value="<?php echo $res ?>"></input>
            <input type="button" id="emp_name" value="<?php echo $_COOKIE['user'] ?>"></input>
        </div>

        <p id="yes"></p>


        <h4>Medication Information </h4>
        <p>
            <span style="background-color: lightyellow">** Medicine have NOT been Administered for Date: <?php
            echo date("M-d-Y");
            ?>
</span> 
        </p>
        <?php
        include('config.php');

        /* @var $_GET type */

        include('config.php');
        $sql = "SELECT * FROM res_medications WHERE res_name = '" . $res . "'  ORDER BY CAST(time_slot AS UNSIGNED), time_slot ";
        $result = mysqli_query($con, $sql);


        echo "<table style='width:90%;'>";

        echo "<tr style='text-align:center; background:white'><h3>" . $res . " Medication Schedule</h3> </tr>";

        echo "<tr>";
        echo "<td style='text-align:center; background:white'><h3>Times</h3> </td>";
        echo "<td  style='text-align:center; background:white' ><h3>Medication</h3> </td>";
        echo "<td style='text-align:center; background:white'><h3>Route</h3> </td>";
        echo "<td style='text-align:center; background:white'><h3>Frequency</h3> </td>";
        echo "<td style='text-align:center; background:white'><h3>Diagnosis</h3> </td>";
        echo "<td style='text-align:center; background:white'><h3>Medication Given</h3> </td>";
        echo "</tr>";
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $sql2 = "SELECT * FROM med_records WHERE entry_date = '" . $currentDate . "' AND time_slot = '" . $row['time_slot'] . "' AND med_name = '" . $row['med_name'] . "' ";
                $result2 = mysqli_query($con, $sql2);
                $count2 = mysqli_num_rows($result2);
                $row2 = mysqli_fetch_array($result2);
                ?>
                <?php
                if ($count2 > 0) {
                    echo '<tr style="background-color: " >';
                } elseif ($row['time_slot'] != "PRN") {
                    echo '<tr style="background-color: lightyellow" >';
                }
                echo "<td style='text-align:center'>"
                ?>

                <button  onclick="displayAllMedTime(this.innerText, this.value, document.getElementById('res_name').value, document.getElementById('emp_name').value)" value="<?php echo $row['med_name'] ?>"><?php echo $row['time_slot'] ?></button>
                <?php
                echo '<td style="text-align:center">' . $row["med_name"] . ' </td>';
                echo "<td style='text-align:center'>" . $row['med_route'] . "</td>";
                echo "<td style='text-align:center'>" . $row['med_freq'] . " </td>";
                echo "<td style='text-align:center'>" . $row['med_diagnosis'] . "</td>";
                echo "<td>";



                if ($count2 > 0) {
                    echo '<p style="background-color: " >'. $row2['status'] . ' on ' . $row2['timestamp'] . ' Submitted by ' . $row2['emp_name'] . ' </p>';
                } else {
                    echo '<p></p>';
                }

                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "No data available";
        }

        echo "</table>";
        mysqli_close($con);
        ?>

    </body>
</html>