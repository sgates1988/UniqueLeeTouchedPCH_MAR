<?php include('config.php'); $admin = $_SESSION["admin"]; ?>
<html>
    <head>
        <title></title>
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

    <body onload="getAlerts();">
        <p style="float:left"  id="alerts"></p>
    <input class="button"  style="float:right" value="Logout" type="submit" onclick="logout()"/>
    <div class="container">
        <header>
            
            <h1 style="color:pink; text-align: center; font-size: 16pt">UniqueLee Touched Personal Care Home </h1>
            <h2 style="color: white; text-align: center">
                Medical Administration Records
            </h2>
        </header>
        <div style="text-align:center;">
            <div id="page">

                <button style="background: #c92c34" class="tablink" id="mar" onclick="getMAR(); return false">Medical Records</button>
                <button class="tablink"  id="vitals" onclick="getVitals(); return false">Vitals</button>
                <?php
                
                
                if ($admin == true) {
                    ?>
                    <button class="tablink"  id="admin" onclick="getAdmin();return false">Admin</button>
                    <?php
                }
                ?>
                    
            </div>
        </div> 
</body>
</html>