<?php
$res = $_GET['res'];
$monthSearch = $_GET['month'];
$yearSearch = $_GET['year'];
$fromDate = $yearSearch . '-' . $monthSearch . '-01';
$toDate = $yearSearch . '-' . $monthSearch . '-31';


if ($monthSearch == "1") {
    $monthFull = "January";
} else if ($monthSearch == "2") {
    $monthFull = "February";
} else if ($monthSearch == "3") {
    $monthFull = "March";
} else if ($monthSearch == "4") {
    $monthFull = "April";
} else if ($monthSearch == "5") {
    $monthFull = "May";
} else if ($monthSearch == "6") {
    $monthFull = "June";
} else if ($monthSearch == "7") {
    $monthFull = "July";
} else if ($monthSearch == "8") {
    $monthFull = "August";
} else if ($monthSearch == "9") {
    $monthFull = "September";
} else if ($monthSearch == "10") {
    $monthFull = "October";
} else if ($monthSearch == "11") {
    $monthFull = "November";
} else if ($monthSearch == "12") {
    $monthFull = "December";
}
?>
<html>
    <link href="css/mar.css" rel="stylesheet" type="text/css"/>
    <script src="js/all.js" type="text/javascript"></script>
    <head>
        <meta charset="UTF-8">
        <title>PRN Report</title>
    </head>
    <style>
        table {
            border: 2px black solid;
            width:100%;

            margin-bottom: 100px;
        }

        th {
            border: 1px grey solid;
        }

        td {
            border: 1px grey solid;
        }
        body {
            background: white;
        }
    </style>
    <body>
        <?php
        include('config.php');
            if ($res == "All") {
                $sql = "SELECT * FROM prn_records WHERE date BETWEEN '" . $fromDate . "' AND '" . $toDate . "' ";
            } else {
                $sql = "SELECT * FROM prn_records WHERE res_name = '$res' AND date BETWEEN '" . $fromDate . "' AND '" . $toDate . "' order by date ASC";
            }

            $result = mysqli_query($con, $sql);
            ?>
            <div>
                <h1><img src="images/logo_1.png" alt=""/>UniqueLee Touched PCH</h1>
                <h2>PRN Report</h2>
                <strong>
                    Resident Name: <?php echo $res ?>
                    <br>
                    Date Range: <?php echo $fromDate ?> to <?php echo $toDate ?>
                    <br>
                    416 Azela Dr
                    <br>
                    STOCKBRIDGE, GA 30281-1632
                    <br>
                    (770) 405-9998                
                </strong>
                <p>
                    "PRN Medication" (pro re nata) means any nonprescription or prescription medication that is to be taken as needed as oppose to "routine" medication that are taken on a regular schedule (e.g. every morning , or twice a day). Complete all boxes in the graph below. The first line is an given example. Wait 30-60 minutes before documenting the response.
                </p>
            </div>
            <div>
                <table>
                    <tr>
                        <th>Resident Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Staff Signature</th>
                        <th>Drug - Strength - Dose</th>
                        <th>Reason Given</th>
                        <th>Response</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Staff Signature</th>
                    </tr>

                    <?php
                    if ($result == false) {
                        echo "No results Found";
                    } else {
                        $count = mysqli_num_rows($result);
                        while ($row = $result->fetch_assoc()) {
                            $i = 0;
                            if ($i <= $count) {
                                echo "<tr>";
                                echo "<td>";
                                echo $row['res_name'];
                                echo "</td>";

                                echo "<td>";
                                echo $row['date'];
                                echo "</td>";

                                echo "<td>";
                                echo $row['time'];
                                echo "</td>";

                                echo "<td>";
                                echo $row['emp_name'];
                                echo "</td>";

                                echo "<td>";
                                echo $row['drug_strgth_dose'];
                                echo "</td>";

                                echo "<td>";
                                echo $row['reason'];
                                echo "</td>";

                                echo "<td>";
                                echo $row['response'];
                                echo "</td>";


                                echo "<td>";
                                echo $row['response_date'];
                                echo "</td>";

                                echo "<td>";
                                echo $row['response_time'];
                                echo "</td>";

                                echo "<td>";
                                echo $row['response_emp_name'];
                                echo "</td>";

                                echo "</tr>";
                                $i = $i + 1;
                            }
                        }
                        ?>

                        <?php
                    }
                    ?>
            </table>
        </div>
    </body>
</html>
