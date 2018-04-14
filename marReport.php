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
    <script src="js/all.js" type="text/java script"></script>
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <head>
        <meta charset="UTF-8">
        <title>MAR Report</title>
    </head>
    <style>
        table {
            table-layout: fixed;
            border-collapse: collapse;
            width: 95%;
            margin-bottom: 20px;
            font-size: 10px;
            table-layout:  auto;
        }

        th {
            border: 1px grey solid;
            height: 20px;
            width: 100px;
        }

        td {
            border: 1px grey solid;
            text-align: center;
        }
        body {
            background: white;
        }

        @media only screen and (max-width: 760px), (max-device-width: 1024px) and (min-device-width: 768px) , table, thead, tbody, th, td, tr {
            display: block;
        } @media print{@page {size: landscape}}
        @media print {
            table {page-break-inside: avoid;}
        }

    </style>
    <body>
        <div>
            <h1> <img src="images/logo_1.png" alt=""/>UniqueLee Touched PCH</h1>
            <h2>Medical Administration Report</h2>
            <strong>
                Resident Name: <?php echo $res ?> </strong>
            <p>
                416 Azela Dr
                <br>
                STOCKBRIDGE, GA 30281-1632
                <br>
                (770) 405-9998
                <br>

            </p>
            <p style="background-color: yellow">
                Report for:

                <?php
                echo $monthFull . " / " . $yearSearch;
                ?>
            </p>
        </div>

        <?php
        include('config.php');

        if ($res == "All" || "") {
            $sql2 = "SELECT * FROM res_medications GROUP BY med_name order by res_name ASC ";
        } else {
            $sql2 = "SELECT * FROM res_medications where res_name = '$res' GROUP BY med_name";
        }

        $result2 = mysqli_query($con, $sql2);
        if ($result2 == false) {
            echo "No results Found";
        } else {

            $count = mysqli_num_rows($result2);
            while ($row = $result2->fetch_assoc()) {

                echo '<table>';
                ?>
            <tr>
                <?php
                $name = $row['res_name'];
                $medname = $row['med_name'];

                $sqltime2 = "SELECT * from res_medications where res_name = '$name' and med_name = '$medname'";


                $resulttime2 = mysqli_query($con, $sqltime2);
                $numTimeSlots = $resulttime2->num_rows;

                $rowSpan = 1 + $numTimeSlots + $numTimeSlots;
                ?>
                <th>Medication Info</th> 
                <th colspan="100%" style="background-color:lightpink"> <div class=""> <span id="residentName"><strong><?php echo $row['res_name'] ?> - &nbsp&nbsp&nbsp&nbsp&nbsp</strong></span>
                        <span id="medication"><strong><?php echo $row['med_name'] ?> - &nbsp&nbsp&nbsp&nbsp&nbsp</strong></span>
                        <span id="rxNum"><?php echo 'RX#: ' . $row['rxNum'] ?>- &nbsp&nbsp&nbsp&nbsp&nbsp</span>
                        <span id="info"><?php echo $row['tabletCount'] . ' ' . $row['med_route'] . ' ' . $row['med_freq'] ?>- &nbsp&nbsp&nbsp&nbsp&nbsp</span>
                        <span id="prescriber"><?php echo 'Prescriber: ' . $row['prescriber'] ?></span>
                    </div></th>  
            </tr>
            <tr>
                <th colspan="100%" style="text-align: center"><div >
                        <?php
                        echo $monthFull . " " . $yearSearch;
                        ?>  
                    </div></th>
            </tr>

            <tr>
                <?php
                echo '<th>Intake Time</th>';

                $dateYear = $yearSearch;
                $dateMonth = $monthSearch;
                $date = $dateYear . '-' . $dateMonth . '-1';
                $currentMonthFirstDay = date("N", strtotime($date));
                $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN, $dateMonth, $dateYear);
                $med = $row['med_name'];
                $time_slot = $row['time_slot'];
                $i = 1;
                for ($i = 1; $i <= $totalDaysOfMonth; $i++) {
                    $date = date("n/" . $i);
                    if ($i < 10) {
                        $formatDate = date("Y-m-0" . $i);
                    } else {
                        $formatDate = date("Y-m-" . $i);
                    }
                    echo '<td ><div>';
                    ?>
                <p><?php echo $i ?></p>
                <?php
                echo '</div></td>';
            }
            ?>
        </tr>
        <?php
        while ($rowtime2 = $resulttime2->fetch_array()) {

            echo '<tr>';
            if ($rowtime2['time_slot'] == "PRN") {
                
            } else {
                if ($rowtime2["status"] == "active") {
                    echo '<th><div class="">';
                    echo $rowtime2['time_slot'];
                    echo '</div></th>';
                } else {
                    echo '<th><div class="">';
                    echo $rowtime2['time_slot'];
                    echo '( Inactive )';
                    echo '</th></div>';
                }
            }

            for ($i = 1; $i <= $totalDaysOfMonth; $i++) {
                $date = date("n/" . $i);
                if ($i < 10) {
                    $formatDate = date("Y-" . $monthSearch . "-0" . $i);
                } else {
                    $formatDate = date("Y-" . $monthSearch . "-" . $i);
                }
                //Include con configuration file2018-02-10
                include 'config.php';
                //Get number of events based on the current date
                //Test for results: echo $fromDate . '_'. $toDate. '_'. $formatDate. '_' .$rowtime2['time_slot']. '_' . $med ;
                $result_ev = $con->query("SELECT * FROM med_records WHERE entry_date BETWEEN '" . $fromDate . "' AND '" . $toDate . "'  AND entry_date = '" . $formatDate . "' AND time_slot = '" . $rowtime2['time_slot'] . "' AND med_name = '$med'");
                $eventNum = $result_ev->num_rows;
                $eventrow = mysqli_fetch_array($result_ev);


                if ($eventNum > 0 && $eventrow['bp'] != "") {
                    echo '<td  style="font-family:Sofia;"><div >';
                    $n = explode(" ", $eventrow['emp_name']);
                    echo substr($n[0], 0, 1);
                    echo substr($n[1], 0, 1);
                    $m = explode("/", $eventrow['bp']);

                    echo '<span><br>';
                    echo substr($m[0], 0, 3) . '<br>';
                    echo substr($m[1], 0, 3);
                    echo '</span></div></td>';
                } else if ($eventNum > 0) {
                    echo '<td style="font-family:Sofia"><div >';
                    $n = explode(" ", $eventrow['emp_name']);
                    echo substr($n[0], 0, 1);
                    echo substr($n[1], 0, 1);
                    echo '</div></td>';
                } else {
                    echo '<td><div >';
                    echo '';
                    echo '</div></td>';
                }
            }
        }
        ?>
        </tr>
        <?php
        echo '<tr><th><div >Side Effects:';

        echo'</div></th><td colspan="';
        echo $totalDaysOfMonth;
        echo ' "><div class="">';

        echo $row['side_effects'];

        echo '</div></td></tr>';
    } echo ' </table> ';
}
?>

</body>
</html>
