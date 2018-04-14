<?php

include('config.php');
define('MyConst', TRUE);
$posted = false;
$id = $_GET['id'];
$resident = $_GET['res'];
$med_name = $_GET['medication'];
$BPrequired = $_GET['bp'];
$rxNum = $_GET['rxNum'];
$prescriber = $_GET['prescriber'];
$tabCount = $_GET['tabCount'];
$route = $_GET['route'];
$frequency = $_GET['frequency'];
$addltFreq = $_GET['addltFreq'];
$sideEffects = $_GET['sideEffects'];
$diagnosis = $_GET['diagnosis'];
$time_slot = $_GET['time_slot'];
$notes = $_GET['notes'];

$sqlCheck = "SELECT * from res_medications WHERE med_record_id='$id' ";

$result = mysqli_query($con, $sqlCheck);



while ($row = $result->fetch_assoc()) {
    $med_id = $row['med_record_id'];

    if ($row['time_slot'] != $time_slot) {
        $sqlCompare = "UPDATE res_medications SET status = 'inactive' WHERE med_record_id='$id'";
        $inactive = true;
    } else {
        $sqlCompare = "UPDATE res_medications SET med_name='$med_name', res_name='$resident', med_route='$route', med_freq='$frequency', med_diagnosis='$diagnosis', time_slot='$time_slot', rxNum='$rxNum', prescriber='$prescriber', tabletCount='$tabCount', med_freq_addtl='$addltFreq', notes='$notes', side_effects='$sideEffects', BPrequired='$BPrequired', timestamp = DATE_FORMAT(NOW(),'%m-%d-%Y %H:%i:%s') WHERE med_record_id='$id'";
        $sqlCompare2 = "UPDATE med_records SET med_name='$med_name', res_name='$resident' WHERE med_id='$med_id' ";
    }

    if (mysqli_query($con, $sqlCompare) && $inactive == true) {
        $sql = "INSERT INTO res_medications (med_name, res_name, med_route, med_freq, med_diagnosis, time_slot, rxNum, prescriber, tabletCount, med_freq_addtl, notes, side_effects, BPrequired, timestamp, created_timestamp, status) VALUES ('$med_name', '$resident', '$route', '$frequency', '$diagnosis', '$time_slot', '$rxNum', '$prescriber', '$tabCount', '$addltFreq', '$notes', '$sideEffects', '$BPrequired', 'NULL', DATE_FORMAT(NOW(),'%m-%d-%Y %H:%i:%s'), 'active') ";
    } else {
        $sql = "Select * from residents";
}

if (mysqli_query($con, $sql)) {
    $posted = true;
    if (mysqli_query($con, $sqlCompare2)) {
        $posted = true;
    }
    
    } else {
        $posted = false;
    }

mysqli_close($con);
?>

<?php

if ($posted) {
    echo "<div>
<p style=' position:absolute; padding-left:10px; padding-right:10px; background-color: lightgrey; width:auto;' >
<h2>* Medication information was updated Successfully</h2>
<button role='button' style='background-color: grey; margin-left: 35%; color:white;' onclick='getAdmin();return false'>Return to Admin Tool</button>
<br>
<h3>Your Information has been saved as: </h3>
<br>
<span>Resident: $resident</span>
<br>
<span>Medication: $med_name</span>
<br>
<span>RX Number: $rxNum</span>
<br>
<span>Blood Pressure Required: $BPrequired</span>
<br>
<span>Prescriber: $prescriber</span>
<br>
<span>Dosage: $tabCount</span>
<br>
<span>Route: $route</span>
<br>
<span>Frequency: $frequency</span>
<br>
<span>Additional Frequency Info: $addltFreq</span>
<br>
span>Side Effects: $sideEffects</span>
<br>
<span>Diagnosis: $diagnosis</span>
<br>
<span>Scheduled Time: $time_slot</span>
<br>
<span>Notes: $notes</span>
</p>
</div>";
} else {
    echo "<div>
<p style=' position:absolute; padding-left:10px; padding-right:10px; background-color: lightgrey; width:auto;' >
<h2>! Unable to complete update. Please Try Again and check information</h2>
<button role='button' style='background-color: grey; margin-left: 35%; color:white;' onclick='getAdmin();return false'>Return to Admin Tool</button>
</p>
</div>";
}

}
