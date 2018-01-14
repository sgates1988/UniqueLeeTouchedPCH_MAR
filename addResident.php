<?php

include('config.php');

$posted = false;
$residentname = $_POST['res_name'];
$res_allergies = $_POST['res_allergies'];
$res_diet = $_POST['res_diet'];


$sql = "INSERT INTO residents (res_name, res_allergies, res_diet) VALUES ('$residentname', '$res_allergies', '$res_diet')";

if (mysqli_query($con, $sql)) {
    $posted = true;
} else {
    $posted = false;
}
mysqli_close($con);
?>

<?php

if ($posted) {
    echo "<p style='position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * A new Resident was added Successfully!</p>";
    header("Location: admin.php");
} else {
    echo "<p style='position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * Request Failed. Please try again!</p>";
    include('admin.php');
}
?>
