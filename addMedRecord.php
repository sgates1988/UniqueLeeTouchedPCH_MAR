<?php

include('config.php');
define('MyConst', TRUE);

$posted = false;
$resident = $_POST['resident'];
$med_name = $_POST['med'];
$BPrequired = $_POST['BPrequired'];
$route = $_POST['route'];
$frequency = $_POST['frequency'];
$diagnosis = $_POST['diagnosis'];
$time_slot = implode(",", $_POST['time_slot']);
$rxNum = $_POST['rxNum'];

$prescriber = $_POST['prescriber'];
$tabCount = $_POST['tabCount'];
$addltFreq = $_POST['addltFreq'];
$notes = $_POST['notes'];
$sideEffects = $_POST['sideEffects'];
$duplicate = false;
//echo $time_slot;
$eachtimeslot = explode(",", $time_slot);
//converts an array to JSON string
$user = $_COOKIE['user'];
$i = 0;

$sqlcheck = "SELECT * FROM res_medications WHERE (med_name, res_name, med_route, med_freq, med_diagnosis, time_slot, rxNum, prescriber, tabletCount, med_freq_addtl, notes, side_effects, BPrequired) = ('$med_name', '$resident', '$route', '$frequency', '$diagnosis', '$eachtimeslot[$i]', '$rxNum', '$prescriber', '$tabCount', '$addltFreq', '$notes', '$sideEffects', '$BPrequired')";

$result = mysqli_query($con, $sqlcheck);

if ($result == false) {
    $duplicate = false;
} else {
    $num_rows = mysqli_num_rows($result);
}

if ($num_rows > 0) {
    $duplicate = true;
} else {
    $duplicate = false;
}

if (isset($_POST['Submit'])) {
    if (!empty($_POST['time_slot'])) {

        if ($i >= 0 && $duplicate == false) {
            foreach ($_POST['time_slot'] as $selected) {
                if ($eachtimeslot[$i] == "") {
                    
                } else {
                    $sql = "INSERT INTO res_medications (med_name, res_name, med_route, med_freq, med_diagnosis, time_slot, rxNum, prescriber, tabletCount, med_freq_addtl, notes, side_effects, BPrequired, timestamp, created_timestamp, status)VALUES ('$med_name', '$resident', '$route', '$frequency', '$diagnosis', '$eachtimeslot[$i]', '$rxNum', '$prescriber', '$tabCount', '$addltFreq', '$notes', '$sideEffects', '$BPrequired', 'NULL', DATE_FORMAT(NOW(),'%m-%d-%Y %H:%i:%s'), 'active')";
                    $i++;
                    if (mysqli_query($con, $sql)) {
                        $posted = true;
                    } else {
                        $posted = false;
                    }
                }
            }
        } else {
            $posted = false;
        }
    }
}


mysqli_close($con);
?>

<?php

if ($posted) {
    echo "<p style=' float:right; position:relative; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > Welcome: $user</p>";
    echo "<p style=' position:relative; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * A new Medication Record was added Successfully</p>";
    include "mar.php";
} else {
    echo "<p style=' float:right; position:relative; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > Welcome: $user</p>";
    echo "<p style='position:relative; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * Request Failed. Please try again!</p>";
    include "mar.php";
}
?>
