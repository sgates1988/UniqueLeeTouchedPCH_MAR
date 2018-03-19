<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Medication</title>
        <link href="css/mar.css" rel="stylesheet" type="text/css"/>
        <script src="js/editResident.js" type="text/javascript"></script>
    </head>
    <style>
        /* Style the tab buttons */
        .tablink {
            background-color: #555;
            color: white;
            float: left;
            border: 2px solid white;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 17px;
            width: 25%;
        }

        /* Change background color of buttons on hover */
        .tablink:hover {
            background-color: black;
        }

        /* Set default styles for tab content */
        .tabcontent {
            color: white;
            display: none;
            padding: 50px;
            text-align: center;
        }


    </style>

    <body>
        <div>
            <?php
            $medId = $_GET['med_id'];

            include('config.php');
            $sql = "SELECT * FROM res_medications WHERE med_record_id = '" . $medId . "'";
            $result = mysqli_query($con, $sql);

            while ($row = $result->fetch_assoc()) {
                ?>
                <form style="padding-left:10px;" >
                    <input  hidden id='id' name='id' value='<?php echo $medId ?>'/>
                    <br><label>Resident:</label>
                    <br>
                    <input disabled id='resident' name='resident' value='<?php echo $row['res_name'] ?>'/>
                    </br>
                    <label>* Medication Name:</label>
                    <br>
                    <input id='medication' name='medication' value='<?php echo $row['med_name'] ?>'/>
                    <br>
                    <label>* Blood Pressure :</label>
                    <select id='bp' class="select" name="BPrequired">
                        <?php if ($row['BPrequired'] == "") { ?>
                            <option value="">Select.....</option> <?php } else { ?>
                            <option value="<?php echo $row['BPrequired'] ?>">Current Value:<?php echo $row['BPrequired'] ?></option>
                        <?php } ?>
                        <option value='Required'>Required</option>";
                        <option value='Not Required'>Not Required</option>
                    </select>
                    </br>
                    <label>RX #:</label>
                    <br>
                    <input class="search-box" id="rxNum" name="rxNum" type="text" value='<?php echo $row['rxNum'] ?>'/>
                    </br>
                    <label>Prescriber Name:</label>
                    <br>
                    <input class="search-box" id="prescriber" name="prescriber" type="text" value='<?php echo $row['prescriber'] ?>'/>
                    </br>
                    <label>* Dosage:</label>
                    <br>
                    <input class="search-box" id="tabCount" name="tabCount" type="text" value='<?php echo $row['tabletCount'] ?>'/>
                    </br>
                    <label>* Route Name:</label>
                    <br>
                    <select  id='route' class="select" id="route" name="route" >
                        <option  value="<?php echo $row['med_route'] ?>">Current Value: <?php echo $row['med_route'] ?></option>
                        <?php
                        include('config.php');

                        $sqlRoute = "SELECT * FROM med_route";
                        $resultRoute = mysqli_query($con, $sqlRoute);

                        while ($rowRoute = $resultRoute->fetch_assoc()) {
                            ?>
                            <option  value="<?php echo $rowRoute['med_route_name'] ?>"><?php echo $rowRoute['med_route_name'] ?></option>

                        <?php }
                        ?>
                    </select>
                    </br>
                    <label>* Frequency:</label>
                    <br>
                    <select  id='frequency' class="select" id="frequency" name="frequency" >
                        <?php if ($row['med_freq'] == "") { ?>
                            <option value="">Select.....</option> <?php } else { ?>
                            <option value="<?php echo $row['med_freq'] ?>">Current Value:<?php echo $row['med_freq'] ?></option>
                            <?php
                        }
                        include('config.php');

                        $sqlFrequency = "SELECT * FROM med_freq";
                        $resultFrequency = mysqli_query($con, $sqlFrequency);

                        while ($rowFrequency = $resultFrequency->fetch_assoc()) {
                            ?>
                            <option  value="<?php echo $rowFrequency['med_freq_name'] ?>"><?php echo $rowFrequency['med_freq_name'] ?></option>

                        <?php }
                        ?>
                    </select>
                    </br>
                    <label>Additional Frequency Info:</label>
                    <br>
                    <input class="search-box" id="addltFreq" name="addltFreq" value='<?php echo $row['med_freq_addtl'] ?>'/>
                    </br>
                    <label>Side Effects:</label>
                    <br>
                    <input class="search-box" id="sideEffects" name="sideEffects" value='<?php echo $row['side_effects'] ?>'/>
                    </br>
                    <label>* Diagnosis Name:</label>
                    <br>
                    <input id="diagnosis" id="diagnosis" name="diagnosis" value='<?php echo $row['med_diagnosis'] ?>'/>
                    </br>
                    <label>* Select Scheduled Times:</label>
                    <br>
                    <select  class="select"  id="time_slot" name="time_slot">
                            <option  value="<?php echo $row['time_slot'] ?>">Current Value: <?php echo $row['time_slot']; ?></option>
                            <option  id="time_slot" value="PRN">PRN</option>
                            <?php
                            include('config.php');

                            $sqlTime = "SELECT * FROM time_slot";
                            $resultTime = mysqli_query($con, $sqlTime);

                            while ($rowTime = $resultTime->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $rowTime['time_slot_name'] ?> "><?php echo $rowTime['time_slot_name']; ?></option>
                            <?php }
                            ?>
                        </select>
                    </br>
                    <label>Additional Notes :</label>
                    <br>
                    <input class="search-box" id="notes" name="notes" type="textarea" style="height: 100px" value='<?php echo $row['notes'] ?>'/>
                    </br>
                    </br>     
                    <button  class="button" name="Update" 
                             onclick='updateMed(
                                                 document.getElementById("id").value,
                                                 document.getElementById("resident").value,
                                                 document.getElementById("medication").value,
                                                 document.getElementById("bp").value,
                                                 document.getElementById("rxNum").value,
                                                 document.getElementById("prescriber").value,
                                                 document.getElementById("tabCount").value,
                                                 document.getElementById("route").value,
                                                 document.getElementById("frequency").value,
                                                 document.getElementById("addltFreq").value,
                                                 document.getElementById("sideEffects").value,
                                                 document.getElementById("diagnosis").value,
                                                 document.getElementById("time_slot").value,
                                                 document.getElementById("notes").value);return false;'>Update</button>
                </form>

            <?php }
            ?>
        </div>
    </body>
</html>
