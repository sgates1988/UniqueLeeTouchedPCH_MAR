
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
    <title>Admin Tool</title>
    <script src="js/admin.js" type="text/javascript"></script>
    <script src="js/editResident.js" type="text/javascript"></script>
    <style>
        .reportHeader {
            font-size: 18pt ; 
        }

        h1 {
            text-align: center;
        }
        .half {
            float: left;
            width: 100%;
            padding: 0 1em;
        }
        /* Acordeon styles */
        .tab {
            position: relative;
            margin-bottom: 1px;
            width: 100%;
            color: black;
        }
        .input {
            position: absolute;
            opacity: 0;
            z-index: -1;
        }
        .label {
            position: relative;
            display: block;
            padding: 0 0 0 1em;
            background: #16a085;
            font-weight: bold;
            line-height: 3;
            cursor: pointer;
        }
        .blue .label {
            background: darkgrey;
        }
        .tab-content {
            max-height: 0;
            overflow: hidden;
            background: #1abc9c;
            -webkit-transition: max-height .35s;
            -o-transition: max-height .35s;
            transition: max-height .35s;
            padding-left: 10px;
            width: 100%;
        }
        .blue .tab-content {
            background: lightgray;
            border: 2px pink solid;
        }
        .tab-content p {
            margin: 1em;
        }
        /* :checked */
        input:checked ~ .tab-content {
            max-height: 100%;
        }
        /* Icon */
        .label::after {
            position: absolute;
            right: 0;
            top: 0;
            display: block;
            width: 3em;
            height: 3em;
            line-height: 3;
            text-align: center;
            -webkit-transition: all .35s;
            -o-transition: all .35s;
            transition: all .35s;
        }
        input[type=checkbox] + label::before {
            content: "+";
        }
        input[type=radio] + label::before {
            content: "\25BC";
        }
        input[type=checkbox]:checked + label::after {
            transform: rotate(315deg);
        }
        input[type=radio]:checked + label::after {
            transform: rotateX(180deg);
        }

    </style>
    <div id="admin-content">
        <h2>Admin Tool</h2>
        <p id="msg" style="display: inline-block"></p>
        <body>
            <div class="half">
                <div class="tab blue">
                    <input class="input" id="tab-four" type="radio" name="tabs2">
                    <label class="label" for="tab-four">Add / Edit Resident's Information</label>
                    <div class="tab-content">
                        <div>
                            <div>
                                <!-- Trigger/Open The Modal -->
                                <button id="newResBtn" class="button" onclick="clearForm();newResModalOpen();">New</button>
                                <div  style="margin-bottom:10px;margin-right:10px;padding-top:10px; ">
                                    <button id="editResBtn" class="button"  onclick="clearForm();editResModalOpen();">Edit</button>

                                </div>
                            </div>
                            <!-- The Modal -->
                            <div id="newResModal" class="modal" >

                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span onclick="newResModalClose()" class="close">&times;</span>
                                    <h1 class="reportHeader">Add New Resident</h1>
                                    <p id="msgRes" style="background-color: yellow"></p>
                                    <form style="padding-left:10px;">
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
                                            <input required type="text" id="res_allergies" name="res_allergies" value="" class="search-box" style="height: 100px" placeholder="Enter Residents Allergies" value=""/>
                                        </div>
                                        <br>
                                        <label>* Diet:</label>
                                        <br>
                                        <div class="search-wrapper">
                                            <input required type="text" id="res_diet" name="res_diet" value="" class="search-box" style="height: 100px" placeholder="Enter Residents Diet" value=""/>
                                        </div>
                                        <br>
                                        <button class="button" onclick="addRes(document.getElementById('res_name').value, document.getElementById('res_allergies').value, document.getElementById('res_diet').value);return false;">Save</button>
                                        <button class="button" onclick="clearForm();return false;">Clear</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab blue">
                    <input class="input" id="tab-five" type="radio" name="tabs2">
                    <label class="label" for="tab-five">Add / Edit Medication Records</label>
                    <div class="tab-content">
                        <div class="">
                            <!-- Trigger/Open The Modal -->
                            <button id="medModalBtn" class="button" onclick="medModalOpen()">New</button>
                            <br>

                            <div class="" style="margin-bottom:10px;margin-right:10px;padding-top:10px; ">
                                <button id="editMedModalBtn" class="button" onclick="editMedModalOpen()">Edit</button>

                            </div>
                            <!-- The Modal -->
                            <div id="medModal" class="modal">

                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span onclick="medModalClose()" class="close">&times;</span>
                                    <p class="reportHeader">Add New Medication Record</p>
                                    <span style="font-size: 14px;"> * Field is required</span>

                                    <form style="padding-left:10px;" name="addMedRecord" method="POST" action="addMedRecord.php">
                                        <br><label>
                                            * Select a resident: 
                                        </label>
                                        <br>
                                        <select  required name="resident" class="select">
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
                                        <select required class="select" name="BPrequired">
                                            <option value="off">No</option>
                                            <option value="on">Yes
                                            </option>
                                        </select>
                                        </br>
                                        <label>RX #:</label>
                                        <br>
                                        <input class="search-box" name="rxNum" type="text"/>
                                        </br>
                                        <label>Prescriber Name:</label>
                                        <br>
                                        <input class="search-box" name="prescriber" type="text"/>
                                        </br>
                                        <label>* Dosage:</label>
                                        <br>
                                        <input class="search-box" required name="tabCount" type="text"/>
                                        </br>
                                        <label>* Route Name:</label>
                                        <br>
                                        <select  class="select" required name="route" >
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
                                        <select class="select" required name="frequency"  onchange="prnDisable(this.value)">
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
                                        <input class="search-box" name="addltFreq" type="text"/>
                                        </br>
                                        <label>Side Effects:</label>
                                        <br>
                                        <input class="search-box" name="sideEffects" type="text"/>
                                        </br>
                                        <label>Diagnosis Name:</label>
                                        <br>
                                        <input class="search-box" name="diagnosis" type="text"/>
                                        </br>
                                        <label>* Select Scheduled Times:</label>
                                        <br>
                                        <br>
                                        <span>( Press and hold CTRL to select multiple times )</span>
                                        <br>
                                        <p id="time" >
                                            <select  class="select" required="true" id="opts" multiple name="time_slot[]">
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

                                        </span>
                                        </br>
                                        <label>Additional Notes :</label>
                                        <br>
                                        <input class="search-box" name="notes" type="textarea" style="height: 100px"/>
                                        </br>
                                        </br>     
                                        <input  class="button" value="Submit" name="Submit" type="submit" ></input>
                                    </form>
                                    <div>
                                        <button class="button" style="position:relative" onclick="cancelAdmin()">Cancel</button>
                                    </div>
                                    </br>
                                </div>

                            </div>
                            <p id="timeReplace" hidden>
                                <select  class="select" required="true" id="opts" multiple name="time_slot[]">
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
                        </div>
                    </div>
                </div>
                <div class="tab blue">
                    <input class="input" id="tab-six" type="radio" name="tabs2">
                    <label class="label" for="tab-six">Reports</label>
                    <div class="tab-content">
                        <div class="">
                            <div>
                                <h3>Search</h3>
                                <br>
                                <span>( Please wait 10 seconds for Report to generate )</span>
                                <table class="blueTable">
                                    <tbody>
                                        <tr>
                                            <td><label for="residents">Residents: </label></td><td>
                                                <select id="residents" name="residents" style="width: 200px;" class="select">
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
                                                </select></td></tr>
                                        <tr>
                                            <td>Month: </td><td>
                                                <select id='month'>
                                                    <option value=''>--Select Month--</option>
                                                    <option selected value='01'>Janaury</option>
                                                    <option value='02'>February</option>
                                                    <option value='03'>March</option>
                                                    <option value='04'>April</option>
                                                    <option value='05'>May</option>
                                                    <option value='06'>June</option>
                                                    <option value='07'>July</option>
                                                    <option value='08'>August</option>
                                                    <option value='09'>September</option>
                                                    <option value='10'>October</option>
                                                    <option value='11'>November</option>
                                                    <option value='12'>December</option>
                                                </select> 
                                            </td>
                                            <td>Year: </td><td>
                                                <select id='year'>
                                                    <option value=''>--Select Year--</option>
                                                    <option selected value='2017'>2017</option>
                                                    <option value='2018'>2018</option>
                                                    <option value='2019'>2019</option>
                                                    <option value='2020'>2020</option>
                                                    <option value='2021'>2021</option>
                                                    
                                                </select> </td>
                                        </tr>
                                        <tr>
                                            <td>Reports: </td><td><select id="reports" name="reports" style="width: 200px;" class="select">
                                                    <option value="mar">Medication Administration Report</option>
                                                    <option value="marDetailed">Medication Record Details Report</option>
                                                    <option value="prn">PRN Record Details</option>
                                                    <option value="vitals">Vital Record Details</option>
                                                </select></td></tr>
                                        <tr><td></tr>
                                    </tbody>
                                    </tr>
                                </table>
                                <div style="margin-bottom: 40px;">
                                    <button class="button"  style="width: 100px;" onclick="getReport(document.getElementById('residents').value, document.getElementById('month').value, document.getElementById('year').value, document.getElementById('reports').value)">
                                        Generate Report
                                    </button>   
                                </div>
                            </div>
                        </div></div>
                </div>
            </div>
    </div>
</body>
</html>
