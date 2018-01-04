<html>
    <head>
    </head>
    <body>
        <div id="info" style="display: none">
            <?php
            include('config.php');
            $user = $_COOKIE['user'];
            $res = ($_GET['res']);
            $sql = "SELECT * FROM res_medications WHERE res_name = '" . $res . "'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            ?>
            <input type="button" id="med_name" value="<?php echo $row['med_name'] ?>"></input>
            <input type="button" id="res_name" value="<?php echo $row['res_name'] ?>"></input>
            <input type="button" id="emp_name" value="<?php echo $_COOKIE['user'] ?>"></input>
        </div>

        <h4>Medication Information </h4>
        <?php
        include('config.php');

        /* @var $_GET type */
        $med = ($_GET['med']);
        $res = ($_GET['res']);
        include('config.php');
        $sql = "SELECT * FROM res_medications WHERE res_name = '" . $res . "'  ORDER BY time_slot DESC";
        $result = mysqli_query($con, $sql);

        echo "<table style='width:90%;'>";
        
                echo "<tr style='text-align:center; background:white'><h3>".$res." Medication Schedule</h3> </tr>";
                
        echo "<tr>";
                echo "<td style='text-align:center; background:white'><h3>Times</h3> </td>";
                echo "<td style='text-align:center; background:white' ><h3>Medication</h3> </td>";
                echo "<td style='text-align:center; background:white'><h3>Route</h3> </td>";
                echo "<td style='text-align:center; background:white'><h3>Frequency</h3> </td>";
                echo "<td style='text-align:center; background:white'><h3>Diagnosis</h3> </td>";
                echo "</tr>";
                $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_array($result)) {
               echo "<tr>";
                echo "<td style='text-align:center'><strong>".$row['time_slot'] ." ".$row['am_pm'] ."</strong> </td>";
                echo "<td style='text-align:center'><strong>".$row['med_name'] ."</strong> </td>";
                echo "<td style='text-align:center'>".$row['med_route'] ."</td>";
                echo "<td style='text-align:center'>".$row['med_freq'] ." </td>";
                echo "<td style='text-align:center'>".$row['med_diagnosis'] ."</td>";
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