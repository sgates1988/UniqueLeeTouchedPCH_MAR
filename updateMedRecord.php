<?php

include('config.php');

$posted = false;
$med_name = $_GET['med'];
$resident = $_GET['res'];
$time_slot = $_GET['time_slot'];
$emp = $_GET['emp'];
$date = $_GET['selectedDate'];
$status = $_GET['status'];
$comments = $_GET['comments'];
$injectionSite = $_GET['injectionSite'];
$units = $_GET['units'];
$bloodPressure = $_GET['bloodPressure'];
$med_id = $_GET['med_id'];

//$date = $_GET['date'];
$sql = "INSERT INTO med_records (med_id, med_name, res_name, time_slot, emp_name, timestamp, entry_date , status, comments, injectionSite, units, bp) VALUES ('$med_id', '$med_name', '$resident', '$time_slot', '$emp', DATE_FORMAT(NOW(),'%m-%d-%Y %H:%i:%s'), '$date', '$status', '$comments', '$injectionSite', '$units', '$bloodPressure')";

    if (mysqli_query($con, $sql)) {
        $posted = true;
    } else {
        $posted = false;
    }
mysqli_close($con);
?>

<?php

if ($posted) {
    echo "<p style=' position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * A new Medication Record was added Successfully</p>";
} else {
    echo "<p style='position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * Request Failed. Please try again!</p>";
}
?>