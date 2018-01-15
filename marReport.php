<?php $res = $_GET['res'] ?>
<html>
    <link href="css/mar.css" rel="stylesheet" type="text/css"/>
    <script src="js/all.js" type="text/javascript"></script>
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <head>
        <meta charset="UTF-8">
        <title>MAR Report</title>
    </head>
    <style>
        table {
            border: 2px black solid;
            width:100%;
            padding-bottom: 10px;
            font-size: small;
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
        <div>
            <h1> <img src="images/logo_1.png" alt=""/>UniqueLee Touched PCH</h1>
            <h2>Medical Administration Report</h2>
            <strong style="font-size:16pt">
                Resident Name: <?php echo $res ?> </strong>
            <p>
                416 Azela Dr
                <br>
                STOCKBRIDGE, GA 30281-1632
                <br>
                (770) 405-9998
            </p>
        </div>
        <button class="button" id="back" onclick="Back()"> Back
        </button>
          
            <?php
            include('config.php');

            if ($res == "All" || "") {
                $sql2 = "SELECT * FROM res_medications order by med_name ASC ";
            } else {
                $sql2 = "SELECT * FROM res_medications where res_name = '$res' order by med_name ASC ";
            }

            $result2 = mysqli_query($con, $sql2);
            if ($result2 == false) {
                echo "No results Found";
            } else {
                $count = mysqli_num_rows($result2);
                while ($row = $result2->fetch_assoc()) {


                    echo '<table>
            <tr><th style="width:1000px">Medication Info</th> ';

                    echo '<th>Intake Time</th>';

                    $dateYear = date("Y");
                    $dateMonth = date("m");
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
                        echo '<td style="text-align:center" >';
                        ?>
                        <p><?php echo $date ?></p>
                        <?php
                        echo '</td>';
                    }
                    ?>


                </tr>
                <tr >
                    <td rowspan="2">                      
                        <p id="medication"><strong><?php echo $row['med_name'] ?></strong></p>
                        <p id="rxNum"><?php echo 'RX#: ' . $row['rxNum'] ?></p>
                        <p id="info"><?php echo 'Take ' . $row['tabletCount'] . ' Tablet ' . $row['med_route'] . ' ' . $row['med_freq'] ?></p>
                        <p id="prescriber"><?php echo 'Prescriber: ' . $row['prescriber'] ?></p>
                    </td>
                    <td><?php echo $row['time_slot'] ?></td>
                    <?php
                    for ($i = 1; $i <= $totalDaysOfMonth; $i++) {
                        $date = date("n/" . $i);
                        if ($i < 10) {
                            $formatDate = date("Y-m-0" . $i);
                        } else {
                            $formatDate = date("Y-m-" . $i);
                        }
                        //Include con configuration file
                        include 'config.php';
                        //Get number of events based on the current date
                        $result_ev = $con->query("SELECT * FROM med_records WHERE entry_date = '" . $formatDate . "' AND time_slot = '" . $time_slot . "' AND med_name = '$med'");
                        $eventNum = $result_ev->num_rows;
                        $eventrow = mysqli_fetch_array($result_ev);

                        if ($eventNum > 0) {
                            echo '<td style="height:70px ;width: 100px;">';
                            echo 'X';
                            echo '</td>';
                        } else {
                            echo '<td style="height:70px ;width: 100px;">';
                            echo '';
                            echo '</td>';
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td><strong>Emp Initials</strong></td>
                    <?php
                    for ($i = 1; $i <= $totalDaysOfMonth; $i++) {
                        $date = date("n/" . $i);
                        if ($i < 10) {
                            $formatDate = date("Y-m-0" . $i);
                        } else {
                            $formatDate = date("Y-m-" . $i);
                        }
                        //Include con configuration file
                        include 'config.php';
                        //Get number of events based on the current date
                        $result_ev = $con->query("SELECT * FROM med_records WHERE entry_date = '" . $formatDate . "' AND time_slot = '" . $time_slot . "' AND med_name = '$med'");
                        $eventNum = $result_ev->num_rows;
                        $eventrow = mysqli_fetch_array($result_ev);

                        if ($eventNum > 0) {
                            echo '<td style="height:70px ;width: 100px; font-family:Sofia">';

                            $n = explode(" ", $eventrow['emp_name']);
                            echo substr($n[0], 0, 1);
                            echo substr($n[1], 0, 1);
                            echo '</td>';
                        } else {
                            echo '<td style="height:70px ;width: 100px;">';
                            echo '';
                            echo '</td>';
                        }
                    } echo ' </tr> ';
                } echo ' </table> ';
            } 
            ?>

</body>
</html>
