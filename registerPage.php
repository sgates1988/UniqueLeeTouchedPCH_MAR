<html>
    <head>
        <title>UniqueLee Touched PCH</title>
        <link href="css/registerPage.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="header">
            <h1>
                UniqueLee Touched Personal Care Home
            </h1>
            <h2>
                Medical Administration Records
            </h2>
            <img src="images/logo.png" alt="logo"/>
        </div>
        <div class="registerbox">
            <h3>
                New Employee Registration
            </h3>
            <form action="register.php" method="post">
                <label> First Name: </label>
                <input type="text" name="empfirstname"/>
                </br>
                <label> Last Name: </label>
                <input type="text" name="emplastname"/>
                </br>
                <label> Username: </label>
                <input type="text" name="newUsername"/>
                </br>
                <label> Password: </label>
                <input type="password" name="newPassword"/>
                </br>
                <label> Email: </label>
                <input type="email" name="newEmail"/>
                </br>
                <label> Phone: </label>
                <input type="tel" name="newPhone" maxlength="10"/>
                </br>
                <label> Employee Type: </label>
                <select name="empType">
                    <option value="admin" >Admin</option>
                    <option value="regular"> Non-Admin</option>
                </select>
                </br>
                </br>
                </br>
                <input class="button" type="submit" value="Register"/>
            </form>
        </div>
    </div>
    </br>
    <a class="button" href="index.php">Click here to return to MAR login page</a>
    <div>
</body>
</html>
