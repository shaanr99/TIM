<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            $login_name = $_POST["uname"];
            $login_pwd = $_POST["upwd"];
            
            // establish connection
            $configData = parse_ini_file("config.ini");
            $con = mysql_connect($configData['host'],$configData['user'], $configData['pwd']);
            mysql_selectdb($configData['dbname'],$con);
            
            $sql = "SELECT DISTINCT userID, firstName, lastName FROM Users WHERE userName = '$login_name' AND userPassword = '$login_pwd'";
            $results = mysql_query($sql, $con);
            $num_rows = mysql_num_rows($results);
            if ($num_rows <= 0){
                die('Error logging in');
            }
            else {
                while ($row = mysql_fetch_assoc($results)){}
                $uid = $row['userID'];
            }

        ?>


        <meta charset="utf-8" />
        <title>Connected:  <?php echo mysql_get_host_info($con) ;?></title>
        <script>
            function processClick(location_name) {
                document.getElementById("frmSelection").action = location_name;
                document.getElementById("frmSelection").submit();
                return;
            }
        </script>
    </head>
    <body>
        <form action="" method="POST" id="frmSelection">
            <fieldset>
                <legend>Please select an option from the list below</legend>
                <input type="button" id="btnAddUser" value="Add New User" onclick="processClick('AddNewUser.php');" >
                <input type="button" id="btnModifyUser" value="Change User Attributes" onclick="processClick('ModifyUser.php');">
                <input type="button" id="btnEnterTime" value="Enter time" onclick="processClick('EnterTime.php');">
                <input type="button" id="btnReports" value="View Reports" onclick="processClick('Reports.php');">
                <input type="hidden" name="uid" value="<?php echo $uid ?>">
                <input type="hidden" name="uname" value="<?php echo $login_name ?>">
                <input type="hidden" name="upwd" value="<?php echo $login_pwd ?>">
                
            </fieldset>
        </form>
    </body>
</html>
