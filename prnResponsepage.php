<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $id = $_GET['id'];
        //echo $id;
        ?>
        <h1>
          Update PRN Record
        </h1>
        <strong style="background-color: yellow"> ** Please complete the response fields.</strong>
        <input id="idfield" type=hidden value="<?php echo $id ?>"/>
        <form>
            <div> 
                <?php
                include('config.php');
                $id = $_GET['id'];
               // echo $id;
                $sql = "SELECT * FROM prn_records where prn_records_id = '$id'";
                $result = mysqli_query($con, $sql);

                while ($row = $result->fetch_assoc()) {

                    $count = mysqli_num_rows($result);
                    //echo $count;
                    ?>
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
                        date_default_timezone_set("America/New_York");
                        $time = date("h:i") ;
                        echo $time;
                        
                        $date = date("Y-m-d");
                        ?>
                        <td>
                        <label>Response:</label>
                        <input class="input" name="response" id="response" type="text">
                        </td>
                        <td>
                        <label>Response Date:</label>
                        <input  class="input" id="response_date" name="response_date" type="date" value="<?php echo $date ?>">
                        </td>
                        <td>
                            <label>Response Time:</label>
                        
                        <input type="time" id="response_time" value="<?php echo $time ?>"/>
                        </td>
                        <td>
                        <label>Staff Signiture for Response:</label>
                        <select class="select" disabled>
                            <option name="response_emp" id="response_emp" value="<?php echo $_COOKIE['user'] ?>"><?php echo $_COOKIE['user'] ?></option>
                        </select>
                        </td>
                        <?php
                    }
                    ?>

                    <?php
                    ?>
                </table>
                    <?php
                    ?>
                <button class="button" onclick="savePrnResponseForm();return false;">Save</button>
                
                <button class="button" onclick="cancelPrnResponse();return false;">Cancel</button>
            </div>
        </div>
</body>
</html>
