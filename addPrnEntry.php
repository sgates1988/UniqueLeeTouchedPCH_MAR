<?php

include('config.php');

$posted = false;
$residents = $_GET['residents'];
$date = $_GET['date'];
$time = $_GET['time'];
$emp = $_GET['emp'];
$drug = $_GET['drug'];
$reason = $_GET['reason'];

$sql = "INSERT INTO prn_records (res_name, date, time, emp_name, drug_strgth_dose, reason, timestamp)VALUES "
        . "('$residents', '$date', '$time', '$emp', '$drug', '$reason', DATE_FORMAT(NOW(),'%m-%d-%Y %H:%i:%s'))";

if (mysqli_query($con, $sql)) {
    $posted = true;
} else {
    $posted = false;
}

mysqli_close($con);
?>

<?php

if ($posted) {
    echo "<p style=' position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * A new PRN Record was added Successfully</p>";
} else {
    echo "<p style='position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * Request Failed. Please try again!</p>";
}
?>