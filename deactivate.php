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


$sql = "UPDATE res_medications SET status = 'inactive' WHERE med_record_id='$id'";


    if (mysqli_query($con, $sql)) {
        $posted = true;
    } else {
        $posted = false;
    }
    mysqli_close($con);
    ?>

    <?php

    if ($posted) {
        echo "<div>
<p style=' position:absolute; padding-left:10px; padding-right:10px; background-color: lightgrey; width:auto;' >
<h2>* Medication record has been deactivated successfully</h2>
<button role='button' style='background-color: grey; margin-left: 35%; color:white;' onclick='getAdmin();return false'>Return to Admin Tool</button>
<br>
<h3>The following record is inactive: </h3>
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
    ?>