<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            $login_name = $_POST["uname"];
            $login_pwd = $_POST["upwd"];
    

            $con = mysql_connect("localhost","shaanr", "T3stpil0t");
            mysql_select_db("tim", $con);
            
            
            $sql = "SELECT DISTINCT userID, firstName, lastName FROM Users WHERE userName = '$login_name' AND userPassword = '$login_pwd'";
            $results = mysql_query($sql, $con);
            $num_rows = mysql_num_rows($results);
            if ($num_rows <= 0){
                die('Error logging in');
            }
            // Get a list of activities that the user can select from
            function populateSelect()
            {
                global $con;
                $sql = "SELECT activityID, activityName FROM Activity";
                $activityList = $con->query($sql);
                while ($row = $activityList->fetch_assoc()){
                        printf("<option value='" . $row["activityID"] . "'>" . $row["activityName"] . "</option>");
                }
            }
        ?>


        <meta charset="utf-8" />
        <title>Connected:  <?php printf($name["dbname"]);?></title>
    </head>
    <body>
        <form action="processSelection.php" method="POST">
            <fieldset>
                <input type="button" id="btnAddUser" value="Add New User" onclick="document.location = 'AddNewUser.php';" >
                <input type="button" id="btnModifyUser" value="Change User Attributes">
                <input type="button" id="btnEnterTime" value="Enter time">
                <input type="button" id="btnReports" value="View Reports">
                <input type="hidden" name="uid" value="<?php echo $uid ?>">
            </fieldset>
            <button type="submit">Post Time</button>
        </form>
    </body>
</html>
