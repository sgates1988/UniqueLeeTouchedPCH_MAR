<html>
    <head>
    </head>
    <body>
        <?php
            include('config.php');
            $med = ($_GET['med']);
            $user = $_COOKIE['user'];
            $res = ($_GET['res']);
            $sql = "SELECT * FROM res_medications WHERE res_name = '" . $res . "'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            ?>
        <div id="info" style="display: none">
            
            <input type="button" id="med" value="<?php echo $med ?>"></input>
            <input type="button" id="res_name" value="<?php echo $row['res_name'] ?>"></input>
            <input type="button" id="emp_name" value="<?php echo $_COOKIE['user'] ?>"></input>
        </div>

        <div style="display: none"> 
        <h4>Medication Information </h4>
        <?php
        include('config.php');

        /* @var $_GET type */
        
        $res = ($_GET['res']);
        include('config.php');
        $sql2 = "SELECT * FROM res_medications WHERE res_name = '" . $res . "' and med_name = '" . $med . "' AND status ='active' GROUP BY med_name Having count(*) > 0 ";
        $result2 = mysqli_query($con, $sql2);

        echo "<table style='width:300px;'>";
        $count = mysqli_num_rows($result2);
        if ($count > 0) {
            while ($row2 = mysqli_fetch_array($result2)) {
                echo "<tr>";
                echo "<td><strong>Route:</strong> " . $row2['med_route'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><strong>Frequency:</strong> " . $row2['med_freq'] . "</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td><strong>Additional Frequency:</strong> " . $row2['med_freq_addtl'] . "</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td><strong>Diagnosis:</strong> " . $row2['med_diagnosis'] . "</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td><strong>Rx Number:</strong> " . $row2['rxNum'] . "</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td><strong>Prescriber:</strong> " . $row2['prescriber'] . "</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td><strong>Dosage:</strong> " . $row2['tabletCount'] . "</td>";
                echo "</tr>";
                
               
                echo "<tr>";
                echo "<td><strong>Notes:</strong> " . $row2['notes'] . "</td>";
                echo "</tr>";
                
            }
        } else {
            echo "No data available";
        }
        echo "</table>";
        mysqli_close($con);
        ?>
</div>
        <div name="resMedsTimes" id="resMedsTimes" class="section">
            <h3> Scheduled Medication Times</h3>      
            <?php
            include('config.php');
            $user = $_COOKIE['user'];
            $sql3 = "SELECT * FROM res_medications WHERE res_name = '" . $res . "' AND med_name = '" . $med . "' AND status ='active' ";
            $result3 = mysqli_query($con, $sql3);
            ?>

            <?php
            while ($row3 = $result3->fetch_assoc()) {
                ?>
                <button class='button' onclick="displayMedTime(this.value, document.getElementById('med').value, document.getElementById('res_name').value, document.getElementById('emp_name').value)" name="meds" value="<?php echo $row3['time_slot'] ?>"><?php echo $row3['time_slot'] ?></button>

            <?php }
            ?>
         <h4>
                1. Click on time to display calendar </br>
                2. Click on date to submit signature
            </h4>
    </div>
    <div name="resMedTimeInfoSection">
        <p id="medTimeInfo"></p>
    </div>
</body>
</html>
  