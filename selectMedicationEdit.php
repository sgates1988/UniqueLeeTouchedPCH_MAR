<html>
    <head>
        <title>Edit Medication</title>
        <link href="css/mar.css" rel="stylesheet" type="text/css"/>
        <script src="js/editResident.js" type="text/javascript"></script>
        <script src="js/admin.js" type="text/javascript"></script>
    </head>
    <style>
        /* Style the tab buttons */
        .tablink {
            background-color: #555;
            color: white;
            float: left;
            border: 2px solid white;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 17px;
            width: 25%;
        }

        /* Change background color of buttons on hover */
        .tablink:hover {
            background-color: black;
        }

        /* Set default styles for tab content */
        .tabcontent {
            color: white;
            display: none;
            padding: 50px;
            text-align: center;
        }


    </style>

    <body>
        <div id="editMed" class="modal-content">

            <h1 class="reportHeader">Update Medication Information</h1>
            <div id="selectMed">
                Select Resident:
                <select  name="resident" id="resident5" class="select" style="width: 150px;" onchange="getMedsEdit(this.value)">
                    <?php
                    include('config.php');

                    $sql = "SELECT * FROM residents";
                    $result = mysqli_query($con, $sql);

                    while ($row = $result->fetch_assoc()) {
                        $con->close();
                        ?>

                        <option id="resident5"name="residents" value="<?php echo $row['res_name'] ?>"><?php echo $row['res_name']; ?></option>

                    <?php }
                    ?>
                </select> 
                <div id='selectMeds'></div>
            </div>
            <br>
        </div>

    </body>
</html>
