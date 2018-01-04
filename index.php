<html>
    <head>
        <title>UniqueLee Touched PCH</title>
        <link href="css/index.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class='header'>
            <h1>
                UniqueLee Touched Personal Care Home
            </h1>
            <h2>
                Medical Administration Records
            </h2> 
            <img src="images/logo.png" alt="logo"/>
        </div>

        <div class='loginbox'>
            <h3>
                Login to the MAR Tool
            </h3>
            <form  name="login" method="post" action="login.php">
                <label>Username:</label>
                <input type="text" name="empUsername"/>
                </br>
                <label>Password:</label>
                <input type="password" name="empPassword"/>
                </br>
                <input  class=button type="submit" name="submit" value="Login" />
            </form>
        </div>
        <div class='adminloginbox'>
            <h3>
                AdminTool
            </h3>
            <a class="button" href="adminLoginPage.php">Click here to login</a>
            <h3>
                New Employee Registration
            </h3>
            <a class="button" href="registerPage.php">Click here to register</a>
        </div>
    </body>
</html>
