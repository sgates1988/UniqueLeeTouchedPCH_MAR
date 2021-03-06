<?php ?>
<head>
    <title>UniqueLee Touched PCH</title>
    <link href="css/getMedTimeInfo.css" rel="stylesheet" type="text/css"/>
    <script src="js/all.js" type="text/javascript"></script>
</head>
<?php
include('config.php');
include_once('medCalendar.php');
$sql = "SELECT * from med_records"
?>
<div id="info" style="display: none">
    <?php
    include('config.php');
    $user = $_COOKIE['user'];
    $res = ($_GET['res']);
    $med = ($_GET['med']);
    $sql = "SELECT * FROM res_medications WHERE res_name = '" . $res . "'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    ?>
</div>

<div>
    <p id="saveEnrty">
    <div id="allInfo" style="display:none">
        <input id="med" name="med" value="<?php echo $med ?>"><?php echo $med ?></input>
        <input id="res" name="res" value="<?php echo $res ?>"><?php echo $res ?></input>
        <input id="time_slot" name="time_slot" value="<?php echo $time_slot ?>"><?php echo $time_slot ?></input>
        <input id="emp" name="emp" value="<?php echo $emp ?>"><?php echo $emp ?></input>
    </div>
    <!-- Display event calendar -->
    <div id="calendar_div">
        <?php echo getCalender(); ?>
    </div>
</div>


<div id="acceptMedRecModal" class="modal" style="display:none" >
    <div class="modal-content">

        <span onclick="acceptMedRecModalClose()" class="close">&times;</span>
        <h3>
            Employee Medication Sign Off
        </h3>
        <p id="selectedDate" style='display:none'></p>
        <span id="empcontent"></span>
        <span id="content"></span>
        <p id="content-options">
        <p id="error" style="background-color: red; color: white"></p>
        <form>
            <strong>*Select action :</strong>
            <select id="status" onchange="checkInjection(this.value)">
                <option type="checkbox" id="select" name="select" value="">Select</option>

                <option type="checkbox" id="sign-off" name="sign-off" value="Signed-off">Medication Given</option>

                <option type="checkbox" id="refused" name="refused" value="Refused">Refused</option>


                <option type="checkbox" id="loa" name="loa" value="LOA">LOA</option>


                <option type="checkbox" id="other" name="other" value="Other">Other - See Comments</option>

            </select> 
            </br>
            <span>Comments:</span>
            <input style="width:300px; height: 100px" id="comments" name="comments" value="" placeholder="Enter any relavent information here">
            </br>
            </br>
            <div id="injection" style="display: none">
                <p>Note: Complete below fields ONLY if Injection was given</p>
                <span>Injection Site :</span>
                <select id="injectionSite" name="injectionSite" >
                    <option value="N/A">N/A</option>
                    <?php
                    include('config.php');

                    $sql = "SELECT * FROM injection_sites";
                    $result = mysqli_query($con, $sql);

                    while ($row = $result->fetch_assoc()) {
                        $con->close();
                        ?>

                        <option  value="<?php echo $row['site'] ?>"><?php echo $row['site']; ?></option>

                    <?php }
                    ?>
                </select>
                </br>
                <span>Units :</span>
                <input type="text" id="units" name="units" value="N/A">
                <br>
            </div>

            </br>

            <button  class="button" type="button" name="submit" onclick="addRecord(document.getElementById('selectedDate').innerHTML, document.getElementById('status').value, document.getElementById('comments').value, document.getElementById('injectionSite').value, document.getElementById('units').value);
                    return false;">Accept</button>
        </form>
    </div>
</div>

