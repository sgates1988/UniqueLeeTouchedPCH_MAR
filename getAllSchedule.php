<html>
    <head>
        <script src="js/all.js" type="text/javascript"></script>
        <link href="css/getAlSchedule.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onunload="getyy()">
        <?php
        $user = $_COOKIE['user'];
        $currentDate = date("Y-m-d");
        $dateSimple = date("m-d-Y");
        $res = ($_GET['q']);
        ?>
        <div id="info" style="display: none">
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
        $sql = "SELECT * FROM res_medications ORDER BY time_slot LIKE '%AM%' DESC, SUBSTR(time_slot, 1, 2) ";
        $result = mysqli_query($con, $sql);


        echo "<table style='width:90%;'>";

        echo "<tr style=' background:white'><h3>Medication Schedule</h3> </tr>";

        echo "<tr>";
        echo "<td style=' background:white'><h3>Times</h3> </td>";
        echo "<td  style=' background:white' ><h3>Medication</h3> </td>";
        echo "<td  style=' background:white' ><h3>Resident</h3> </td>";
        echo "<td style=' background:white'><h3>Route</h3> </td>";
        echo "<td style=' background:white'><h3>Frequency</h3> </td>";
        echo "<td style=' background:white'><h3>Diagnosis</h3> </td>";
        echo "<td style=' background:white'><h3>Status</h3> </td>";
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
                echo '<td style="text-align:center">' . $row['time_slot'] . ' </td>';
                echo '<td style="text-align:center">' . $row["med_name"] . ' </td>';
                echo '<td style="text-align:center">';
                ?>
                <p id="res_name" ><?php echo $row['res_name'] ?></p>

                <?php
                echo '</td>';

                echo "<td style='text-align:center'>" . $row['med_route'] . "</td>";
                echo "<td style='text-align:center'>" . $row['med_freq'] . " </td>";
                echo "<td style='text-align:center'>" . $row['med_diagnosis'] . "</td>";
                echo "<td>";



                if ($count2 > 0) {
                    echo '<p style="text-align:center" >' . $row2['status'] . ' on ' . substr($row2['timestamp'], 0, -8) . '. Submitted by ' . $row2['emp_name'] . ' </p>';
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