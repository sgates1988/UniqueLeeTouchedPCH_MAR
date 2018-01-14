<html>
    <head>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            table, td, th {
                border: 1px solid black;
                padding: 5px;
            }

            th {text-align: left;}
        </style>
    </head>
    <body>
        <h4>  Resident Information </h4>
        <?php
        include('config.php');

        /* @var $_GET type */
        $q = ($_GET['q']);

        include('config.php');
        $sql = "SELECT * FROM residents WHERE res_name = '" . $q . "'";
        $result = mysqli_query($con, $sql);

        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<span> Name: " . $row['res_name'] . "</span></br>";
                echo "<span> Diet: " . $row['res_diet'] . "</span></br>";
                echo "<span> Allergies: " . $row['res_allergies'] . "</span></br>";
                echo "</tr>";
            }
        } else {
            echo "No data available";
        }

        mysqli_close($con);
        ?>
        <div name="resMeds" id="resMeds" class="section">
            <span style="background-color: yellow;">*Reorder medications & Supplies - 5 day   			
</span>
            <h3> Select Medication(s) </h3>
            <select id="medication" onchange="displayMeds(this.value, document.getElementById('Residents').value)">
                <option name="residentsMeds" value="">Select medication....</option>
                <option name="meds" value="all">ALL</option>
                
                <?php
                include('config.php');
                $sql = "SELECT * FROM res_medications WHERE res_name = '" . $q . "' GROUP BY med_name Having count(*) > 0  ";
                $result = mysqli_query($con, $sql);

                while ($row = $result->fetch_assoc()) {
                    $con->close();
                    ?>
                

                    <option name="medName" value="<?php echo $row['med_name'] ?>"><?php echo $row['med_name']; ?></option>

                <?php }
                ?>
            </select>
        </div>
        <div name="resMedInfoSection">
            <p id="medInfo"></p>
            <p id="medInfoall"></p>
        </div>
    </body>
</html>