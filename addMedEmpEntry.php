<?php

include('config.php');

$posted = false;
$med_name = $_POST['med'];
$resident = $_POST['resident'];
$time_slot = $_POST['time_slot'];
$emp = $_POST['empName'];
$t = time();
$timestamp = (date("m-d-Y", $t));

$sql = "INSERT INTO med_records ( med_name, res_name, time_slot, emp_name, timestamp )VALUES ('$med_name', '$resident', '$time_slot', '$emp', '$timestamp')";

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
    include('admin.php');
} else {
    echo "<p style='position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * Request Failed. Please try again!</p>";
}
?>