
<?php
if (isset($_GET['access'])) {
    $accessGranted = $_GET['access'];
    if ($accessGranted !== "true") {
    die('Direct access not permitted');
}
} else {
 die('Direct access not permitted');  
}
?>
<html>
    <div>
        <p id="msg" style="display: inline-block"></p>
        <div class="section" >
            <div>
                <h3>
                    Add / Edit Resident's Information
                </h3>

                <!-- Trigger/Open The Modal -->
                <button id="newResBtn" class="button" onclick="clearForm();newResModalOpen();">New</button>
                <div class="section" style="margin-bottom:10px;margin-right:10px;padding-top:10px; border-style: dotted;">

                    Select Resident:
                    <select  name="resident" id="resident5" class="search-box" style="width: 150px;" >
                        <?php
                        include('config.php');

                        $sql = "SELECT * FROM residents";
                        $result = mysqli_query($con, $sql);

                        while ($row = $result->fetch_assoc()) {
                            $con->close();
                            ?>

                            <option id="resident5"name="residents" value="<?php echo $row['res_name'] ?>"><?php echo $row['res_name']; ?></option>

                        <?php }
                        ?>
                    </select>
                    <button id="editResBtn" class="button"  onclick="clearForm();editResModalOpen(document.getElementById('resident5').value);">Edit</button>
                </div>
            </div>
            <!-- The Modal -->
            <div id="newResModal" class="modal" >

                <!-- Modal content -->
                <div class="modal-content">
                    <span onclick="newResModalClose()" class="close">&times;</span>
                    <h2>Add New Resident</h2>
                    <p id="msgRes" style="background-color: yellow"></p>
                    <form>
                        <br>
                        <label>* Resident Name:</label>
                        <br>
                        <div class="search-wrapper">
                            <input id="res_name" type="text" name="res_name" required class="search-box" placeholder="Enter Residents Full Name" value=""/>
                        </div>
                        <br>
                        <label>* Allergies:</label>
                        <br>
                        <div class="search-wrapper">
                            <input required type="text" id="res_allergies" name="res_allergies" value="" class="search-box" style="height: 150px" placeholder="Enter Residents Allergies" value=""/>
                        </div>
                        <br>
                        <label>* Diet:</label>
                        <br>
                        <div class="search-wrapper">
                            <input required type="text" id="res_diet" name="res_diet" value="" class="search-box" style="height: 150px" placeholder="Enter Residents Diet" value=""/>
                        </div>
                        <br>
                        <button class="button" onclick="addRes(document.getElementById('res_name').value, document.getElementById('res_allergies').value, document.getElementById('res_diet').value);return false;">Save</button>
                        <button class="button" onclick="clearForm();return false;">Clear</button>
                    </form>
                </div>
            </div>
            <!-- The Modal -->
            <div id="editResModal" class="modal" >

                <!-- Modal content -->
                <div class="modal-content">
                    <span onclick="editResModalClose()" class="close">&times;</span>
                    <h2>Edit Resident</h2>
                    <p id="msgRes" style="background-color: yellow"></p>
                    <form>
                        Resident:
                        <br>
                        <input  id=residentName"" name="residentName" class="search-box"/>

                        <br>
                        <label>* Allergies:</label>
                        <br>
                        <div class="search-wrapper">
                            <input required type="text" id="res_allergies" name="res_allergies" value="" class="search-box" style="height: 150px" placeholder="Enter Residents Allergies" value=""/>
                        </div>
                        <br>
                        <label>* Diet:</label>
                        <br>
                        <div class="search-wrapper">
                            <input required type="text" id="res_diet" name="res_diet" value="" class="search-box" style="height: 150px" placeholder="Enter Residents Diet" value=""/>
                        </div>
                        <br>
                        <button class="button" onclick="updateRes(document.getElementById('res_name').value, document.getElementById('res_allergies').value, document.getElementById('res_diet').value);return false;">Save</button>
                        <button class="button" onclick="clearForm();return false;">Clear</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="section">
            <h3>
                Add / Edit Medication Records
            </h3>
            <!-- Trigger/Open The Modal -->
            <button id="medModalBtn" class="button" onclick="medModalOpen()">New</button>
            <br>

            <div class="section" style="margin-bottom:10px;margin-right:10px;padding-top:10px; border-style: dotted;">
                Select Resident:
                <select  name="resident" id="resident5" class="search-box" style="width: 150px;" onchange="getMedsEdit(this.value)">
                    <?php
                    include('config.php');

                    $sql = "SELECT * FROM residents";
                    $result = mysqli_query($con, $sql);

                    while ($row = $result->fetch_assoc()) {
                        $con->close();
                        ?>

                        <option id="resident5"name="residents" value="<?php echo $row['res_name'] ?>"><?php echo $row['res_name']; ?></option>

                    <?php }
                    ?>
                </select>

                Select Medication:
                <select  name="resident" id="resident5" class="search-box" style="width: 150px;" >
                    <?php
                    include('config.php');

                    $sql = "SELECT * FROM res_medications GROUP BY med_name";
                    $result = mysqli_query($con, $sql);

                    while ($row = $result->fetch_assoc()) {
                        $con->close();
                        ?>

                        <option id="resident5"name="residents" value="<?php echo $row['med_name'] ?>"><?php echo $row['med_name']; ?></option>

                    <?php }
                    ?>
                </select>       <button id="editMedModalBtn" class="button" onclick="editMedModalOpen()">Edit</button>
            </div>
            <!-- The Modal -->
            <div id="medModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span onclick="medModalClose()" class="close">&times;</span>
                    <h2>Add New Medication Record</h2>
                    <span style="font-size: 10px;"> * Field is required</span>

                    <form name="addMedRecord" method="POST" action="addMedRecord.php" novalidate>
                        <br><label>
                            * Select a resident: 
                        </label>
                        <br>
                        <select  name="resident" class="search-box">
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
                        <label>* Medication Name:</label>
                        <br>
                        <input class="search-box" required name="med" type="text">
                        <br>
                        <label>* Blood Pressure Required:</label>
                        <select class="search-box" name="BPrequired">
                            <option value="off">No</option>
                            <option value="on">Yes
                            </option>
                        </select>
                        </br>
                        <label>RX #:</label>
                        <br>
                        <input class="search-box" required name="rxNum" type="text"/>
                        </br>
                        <label>Prescriber Name:</label>
                        <br>
                        <input class="search-box" required name="prescriber" type="text"/>
                        </br>
                        <label>* Dosage:</label>
                        <br>
                        <input class="search-box" required name="tabCount" type="text"/>
                        </br>
                        <label>* Route Name:</label>
                        <br>
                        <select  class="search-box" required name="route" >
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
                        <label>* Frequency:</label>
                        <br>
                        <select class="search-box" required name="frequency"  onchange="prnDisable(this.value)">
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
                        <br>
                        <input class="search-box" required name="addltFreq" type="text"/>
                        </br>
                        <label>Side Effects:</label>
                        <br>
                        <input class="search-box" name="sideEffects" type="text"/>
                        </br>
                        <label>* Diagnosis Name:</label>
                        <br>
                        <input class="search-box" required name="diagnosis" type="text"/>
                        </br>
                        <label>* Select Scheduled Times:</label>
                        <br>
                        <br>
                        <span>( Press and hold CTRL to select multiple times )</span>
                        <br>
                        <p id="time" >
                            <select  class="search-box" required="true" id="opts" multiple name="time_slot[]">
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
                            <select class="search-box" id="optsPRN" required="false" name="time_slot[]">

                                <option   id="time_slot" value="">Select</option>
                                <option  id="time_slot" value="PRN">PRN</option>

                            </select>
                        </span>
                        </br>
                        <label>Additional Notes :</label>
                        <br>
                        <input class="search-box" required name="notes" type="textarea" style="height: 100px"/>
                        </br>
                        </br>     
                        <input  class="button" value="Submit" name="Submit" type="submit" ></input>
                    </form>
                    </br>
                </div>

            </div>
        </div>

        <div class="section">
            <h3>Reports</h3>
            <h4>Sort By: Resident</h4>

            <select id="resReport" name="res" style="width: 200px;" class="search-box">
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
                Medication Administration Report
            </h3>
            <span>( Please wait 10 seconds for Report to generate )</span>
            <br>
            <button class="button"  style="width: 100px; onclick="getReport(document.getElementById('resReport').value)">
                    Generate Report
        </button>
        <h3>
            Medication Record Details Report
        </h3>
        <button class="button" style="width: 100px; onclick="getDetailedReport(document.getElementById('resReport').value)">
                Generate Report
    </button>   
    <h3>
        PRN Record Details
    </h3>
    <button class="button" style="width: 100px; onclick="getPrnReport(document.getElementById('resReport').value)">
            Generate Report
</button>
<h3>
    Vital Record Details
</h3>
<button class="button" style="width: 100px;" onclick="getVitalReport(document.getElementById('resReport').value)">
    Generate Report
</button>
</div>
</div>
</body>
</html>
