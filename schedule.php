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
        $sql = "SELECT * FROM res_medications WHERE res_name = '" . $res . "' GROUP BY med_name Having count(*) > 0 ";
        $result = mysqli_query($con, $sql);

        echo "<table style='width:300px;'>";
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td style='text-align:center'><strong>" . $row['med_name'] . "</strong> </td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><strong>Route:</strong> " . $row['med_route'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><strong>Frequency:</strong> " . $row['med_freq'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><strong>Diagnosis:</strong> " . $row['med_diagnosis'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color:white'></td>";
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