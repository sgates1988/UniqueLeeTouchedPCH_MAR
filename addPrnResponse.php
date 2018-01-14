<?php

include('config.php');

$posted = false;
$id = $_GET['id'];
$response = $_GET['response'];
$responseDate = $_GET['responseDate'];
$responseTime = $_GET['responseTime'];
$responseEmp = $_GET['responseEmp'];

$sql = "UPDATE prn_records SET response ='$response', response_date = '$responseDate', response_time = '$responseTime', response_emp_name = '$responseEmp', timestamp = NOW() WHERE prn_records_id = '$id'";

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