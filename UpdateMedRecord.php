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
//$date = $_GET['date'];
$sqlcheck = "SELECT * from med_records where entry_date = '$date' AND time_slot = '$time_slot' AND res_name = '$resident' ";
$sql = "INSERT INTO med_records (med_name, res_name, time_slot, emp_name, timestamp, entry_date , status, comments) VALUES ('$med_name', '$resident', '$time_slot', '$emp', NOW(), '$date', '$status', '$comments')";

$result = mysqli_query($con, $sqlcheck);

$count = mysqli_num_rows($result);
if ($count >= 1) {
    echo "<span style=' position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * Duplicate Entry. One Entry Only</span>";
} else {
    if (mysqli_query($con, $sql)) {
        $posted = true;
    } else {
        $posted = false;
    }
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