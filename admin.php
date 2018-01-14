<html>
    <head>
        <title>UniqueLee Touched PCH</title>
        <script src="js/logout.js" type="text/javascript"></script>
        <link href="css/adminPage.css" rel="stylesheet" type="text/css"/>
        <script src="js/admin.js" type="text/javascript"></script>
    </head>
    <body id="report">
        <input class="button"  style="float:right" value="Logout" type="submit" onclick="logout()"</input>

        <div class='header'>

            <h1>
                UniqueLee Touched Personal Care Home
            </h1>
            <h2>
                Administration Tool
            </h2> 
        </div>
        <div>
            <div class="section" >
                <div>

                    <h3>
                        Add a Resident
                    </h3>
                    <!-- Trigger/Open The Modal -->
                    <button id="newResBtn" class="button" onclick="newResModalOpen()">New</button>
                </div>
                <!-- The Modal -->
                <div id="newResModal" class="modal" >

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span onclick="newResModalClose()" class="close">&times;</span>
                        <h2>Add New Resident</h2>
                        <form name="addRes" method="post" action="addResident.php" >
                            <label>Resident Name:</label>
                            <br>
                            <input required type="text" name="res_name"/>
                            <br>
                            <label>Allergies:</label>
                            <br>
                            <input required type="text" name="res_allergies" style="width:300px; height:150px; margin-right: 20px;" />
                            <br>
                            <label>Diet:</label>
                            <br>
                            <input required type="text" name="res_diet" style="width:300px; height:150px;"/>
                            </br>
                            <input class="button" type="submit" value="Save"/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="section">
                <h3>
                    New Medication Record
                </h3>
                <!-- Trigger/Open The Modal -->
                <button id="medModalBtn" class="button" onclick="medModalOpen()">New</button>

                <!-- The Modal -->
                <div id="medModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span onclick="medModalClose()" class="close">&times;</span>
                        <h2>Add New Medication Record</h2>
                        <form name="addMedRecord" method="POST" action="addMedRecord.php" novalidate>
                            <label>
                                Select a resident
                            </label>
                            <select name="resident" onchange="displayRes(this.value)">
                                <?php
                                include('config.php');

                                $sql = "SELECT * FROM residents";
                                $result = mysqli_query($con, $sql);

                                while ($row = $result->fetch_assoc()) {
                                    $con->close();
                                    ?>

                                    <option name="residents" value="<?php echo $row['res_name'] ?>"><?php echo $row['res_name']; ?></option>

                                <?php }
                                ?>
                            </select>
                            </br>
                            <label>Medication Name:</label>
                            <input required name="med" type="text">
                            </br>
                            <label>RX #:</label>
                            <input required name="rxNum" type="text"/>
                            </br>
                             <label>Prescriber Name:</label>
                            <input required name="prescriber" type="text"/>
                            </br>
                             <label>Number of Tablets:</label>
                            <input required name="tabCount" type="text"/>
                            </br>
                            <label>Route Name:</label>
                            <select required name="route" >
                                <?php
                                include('config.php');

                                $sql = "SELECT * FROM med_route";
                                $result = mysqli_query($con, $sql);

                                while ($row = $result->fetch_assoc()) {
                                    $con->close();
                                    ?>

                                    <option  value="<?php echo $row['med_route_name'] ?>"><?php echo $row['med_route_name']; ?></option>

                                <?php }
                                ?>
                            </select>
                            </br>
                            <label>Frequency Name:</label>
                            <select required name="frequency"  onchange="prnDisable(this.value)">
                                <?php
                                include('config.php');

                                $sql = "SELECT * FROM med_freq";
                                $result = mysqli_query($con, $sql);

                                while ($row = $result->fetch_assoc()) {
                                    $con->close();
                                    ?>

                                    <option value="<?php echo $row['med_freq_name'] ?>"><?php echo $row['med_freq_name']; ?></option>

                                <?php }
                                ?>
                            </select>
                            </br>
                             <label>Additional Frequency Info:</label>
                            <input required name="addltFreq" type="text"/>
                            </br>
                            <label>Diagnosis Name:</label>
                            <input required name="diagnosis" type="text"/>
                            </br>
                            <label>Select Scheduled Times:</label>

                            <p id="time" >
                                <select required="true" id="opts" multiple name="time_slot[]">
                                    <?php
                                    include('config.php');

                                    $sql = "SELECT * FROM time_slot";
                                    $result = mysqli_query($con, $sql);

                                    while ($row = $result->fetch_assoc()) {
                                        ?>

                                        <option name="time_slot[]" id="time_slot" value="<?php echo $row['time_slot_name'] ?> "><?php echo $row['time_slot_name']; ?></option>


                                    <?php }
                                    ?>
                                </select>
                            </p>
                            <span id="PRN"   style="display: none">
                                <select id="optsPRN" required="false" name="time_slot[]">
                                    
                                    <option   id="time_slot" value="">Select</option>
                                    <option  id="time_slot" value="PRN">PRN</option>
                                    
                                </select>
                            </span>
                            </br>
                                <label>Additional Notes :</label>
                            <input required name="notes" type="textarea" style="width: 300px; height: 100px"/>
                            </br>
                            </br>     
                            <input class="button" value="Submit" name="Submit" type="submit" ></input>
                        </form>
                        </br>
                    </div>

                </div>
            </div>

            <div class="section">
                <h3>Reports</h3>
                <h4>Sort By: Resident</h4>

                <select id="resReport" name="res">
                    <option value="All">All</option>
                    <?php
                    include 'config.php';
                    $sql = "Select * from residents";
                    $result = mysqli_query($con, $sql);

                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row['res_name'] ?> "><?php echo $row['res_name'] ?></option>
                    <?php }
                    ?>
                </select>
                <h3>
                    Medication Record Details
                </h3>
                <button class="button" onclick="getReport(document.getElementById('resReport').value)">
                    Generate Report
                </button>
                <h3>
                    PRN Record Details
                </h3>
                <button class="button" onclick="getPrnReport(document.getElementById('resReport').value)">
                    Generate Report
                </button>
            </div>
        </div>
    </body>
</html>
