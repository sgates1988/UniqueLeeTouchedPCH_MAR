<?php
include_once('medCalendar.php');
?>
<html>
    <head>
        <title>UniqueLee Touched PCH</title>
        <link href="css/getMedTimeInfo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <?php
        include('config.php');

        $sql = "SELECT * from med_records"
        ?>

        <h3> 

            <div id="info" style="display: none">
                <?php
                include('config.php');
                $user = $_COOKIE['user'];
                $res = ($_GET['res']);
                $sql = "SELECT * FROM res_medications WHERE res_name = '" . $res . "'";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                ?>
                <input type="button" id="med_name" value="<?php echo $row['med_name'] ?>"></input>
                <input type="button" id="res_name" value="<?php echo $row['res_name'] ?>"></input>
                <input type="button" id="emp_name" value="<?php echo $_COOKIE['user'] ?>"></input>


            </div>

            <div>
                <form id="saveEnrty"  >
                    <div id="allInfo" style="display:none">
                        <input id="med" name="med" value="<?php echo $med ?>"><?php echo $med ?></input>
                        <input id="res" name="res" value="<?php echo $res ?>"><?php echo $res ?></input>
                        <input id="time_slot" name="time_slot" value="<?php echo $time_slot ?>"><?php echo $time_slot ?></input>
                        <input id="emp" name="emp" value="<?php echo $emp ?>"><?php echo $emp ?></input>
                    </div>

                    <!-- Display event calendar -->
                    <div id="calendar_div">
                        <?php echo getCalender(); ?>
                    </div>
            </div>
        </div>


        <div id="acceptMedRecModal" class="modal" style="display:none" >
            <div class="modal-content">

                <span onclick="acceptMedRecModalClose()" class="close">&times;</span>
                <h2>
                    Employee Medication Sign Off
                </h2>
                <form action="" method="post"> 

                    <p id="selectedDate" style='display:none'></p>
                    <p id="content"></p>

                    <button  class="button" type="submit" name="submit" onclick="addRecord(document.getElementById('selectedDate').innerHTML);return false;">Accept</button>
                </form>

            </div>

            </body>

            </html>
