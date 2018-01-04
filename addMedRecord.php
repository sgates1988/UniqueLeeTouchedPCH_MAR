

<?php

include('config.php');

$posted = false;
$resident = $_POST['resident'];
$med_name = $_POST['med'];
$route = $_POST['route'];
$frequency = $_POST['frequency'];
$diagnosis = $_POST['diagnosis'];
$time_slot = implode(" ",$_POST['time_slot']);
$eachtimeslot = explode(" ",$time_slot);


$am_pm =($_POST['am_pm']);
$i = 0;
echo $eachtimeslot;


if (isset($_POST['Submit'])) {
    if (!empty($_POST['time_slot'])) {


        if ($i >= 0) {
          foreach ($_POST['time_slot'] as $selected) {
                $sql = "INSERT INTO res_medications (res_name, med_name, med_route, med_freq, med_diagnosis, time_slot, am_pm)VALUES ('$resident', '$med_name', '$route', '$frequency', '$diagnosis', '$eachtimeslot', '$am_pm')";
                $i++;
                if (mysqli_query($con, $sql)) {
                    $posted = true;
                } else {
                    $posted = false;
                }
           }
      }
    }
}

mysqli_close($con);
?>

<?php

if ($posted) {
    //header("Location:admin.php");
    echo "<p style=' position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * A new Medication Record was added Successfully</p>";
    
} else {
    echo "<p style='position:absolute; padding-left:10px; padding-right:10px; color:black; border-bottom: 6px solid red; background-color: lightgrey; width:200px;' > * Request Failed. Please try again!</p>";
}
?>