<?php
include_once('medCalendar.php');
?>
<head>
    <title>UniqueLee Touched PCH</title>
    <link href="css/getMedTimeInfo.css" rel="stylesheet" type="text/css"/>
</head>
<?php
include('config.php');
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
        <h2>
            Employee Medication Sign Off
        </h2>
        <p id="selectedDate" style='display:none'></p>
        <span id="content"></span>
        <p id="content-options">
        <form>
            <span>Select action :</span>
            <select id="status">
                <option type="checkbox" id="select" name="select" value="">Select</option>

                <option type="checkbox" id="sign-off" name="sign-off" value="sign-off">Medication Given</option>

                <option type="checkbox" id="refused" name="refused" value="refused">Refused</option>


                <option type="checkbox" id="loa" name="loa" value="LOA">LOA</option>


                <option type="checkbox" id="other" name="other" value="other">Other - See Comments</option>

            </select> 
            </br>
            <input style="width:300px; height: 100px" id="comments" name="comments" value="" placeholder="Enter any relavent information here">
            </br>

            <button  class="button" type="button" name="submit" onclick="addRecord(document.getElementById('selectedDate').innerHTML, document.getElementById('status').value, document.getElementById('comments').value);
                    return false;">Accept</button>
        </form>
    </div>
</div>

