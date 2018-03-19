<html>
    <link href="css/mar.css" rel="stylesheet" type="text/css"/>
    <script src="js/all.js" type="text/javascript"></script>
    <head>
        <meta charset="UTF-8">
        <title>Vital Report</title>
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
        $res = $_GET['res'];

        if ($res === "All") {
            $sql = "SELECT * FROM vitals order by timestamp DESC";
        } else {
            $sql = "SELECT * FROM vitals where res_name = '$res' order by timestamp DESC";
        }
        $result = mysqli_query($con, $sql);
        ?>
        <div>
            <h1><img src="images/logo_1.png" alt=""/>UniqueLee Touched PCH</h1>
            <h2>Vitals Report</h2>
            <strong>
                Resident Name: <?php echo $res ?>
                <br>
                416 Azela Dr
                <br>
                STOCKBRIDGE, GA 30281-1632
                <br>
                (770) 405-9998                
            </strong>
 </div>
        <div>
            <table>
                <tr>
                    <th>Resident Name</th>
                    <th>Date</th>
                    <th>Blood Pressure</th>
                    <th>Temperature</th>
                    <th>Weight</th>
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
                            echo $row['timestamp'];
                            echo "</td>";

                            echo "<td>";
                            echo $row['bp'];
                            echo "</td>";

                            echo "<td>";
                            echo $row['temp'];
                            echo "</td>";

                            echo "<td>";
                            echo $row['weight'];
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
