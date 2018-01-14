<html>
    <link href="css/mar.css" rel="stylesheet" type="text/css"/>
    <script src="js/all.js" type="text/javascript"></script>
    <head>
        <meta charset="UTF-8">
        <title>MAR Report</title>
    </head>
    <style>
        table {
            border: 2px black solid;
            width:100%;
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
            <h1>
                Medical Administration Records Report
            </h1>
        </div>
        <div>
            <table>
                <tr>
                    <th>Resident Name</th>
                    <th>Medication Given</th>
                    <th>Scheduled Time</th>
                    <th>Scheduled Date</th>
                    <th>Staff Signature</th>
                    <th>Date Signed Off</th>
                    <th>Status</th>
                    <th>Comments</th>
                </tr>
                <?php
                include('config.php');
                $res = $_GET['res'];
                
                if ($res == "All" || "") {
                  $sql = "SELECT * FROM med_records order by entry_date ASC";   
                } else {
                   $sql = "SELECT * FROM med_records where res_name = '$res' order by entry_date ASC"; 
                }
               
                $result = mysqli_query($con, $sql);
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
                            echo $row['med_name'];
                            echo "</td>";

                            echo "<td>";
                            echo $row['time_slot'];
                            echo "</td>";

                            echo "<td>";
                            echo $row['entry_date'];
                            echo "</td>";

                            echo "<td>";
                            echo $row['emp_name'];
                            echo "</td>";

                            echo "<td>";
                            echo $row['timestamp'];
                            echo "</td>";
                            
                            echo "<td>";
                            echo $row['status'];
                            echo "</td>";
                            
                            echo "<td>";
                            echo $row['comments'];
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
            <button class="button" id="back" onclick="Back()"> Back
            </button>
        </div>
           
    </body>
</html>
