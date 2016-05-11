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
            
            if (!$con)
            {
                printf('Could not connect' . mysql_error());
            }
            
            $sql = "SELECT DISTINCT userID, firstName, lastName FROM Users WHERE userName = '$login_name' AND userPassword = '$login_pwd'";
            $results = mysql_query($sql,$con);
            if (mysql_num_rows($results) > 0){
                while ($row = mysql_fetch_assoc($results)){
                    $uid = $row["userID"];
                    $firstName = $row["firstName"];
                    $lastName = $row["lastName"];
                }
            mysql_close($con);
            }
            else {
                 die('Error logging in');
            }
            // Get a list of activities that the user can select from
            function populateSelect()
            {
                $configData = parse_ini_file("config.ini");
                $con = mysql_connect($configData['host'],$configData['user'], $configData['pwd']);
                mysql_selectdb($configData['dbname'],$con);
                
                if (!$con)
                {
                    printf('Could not connect' . mysql_error());
                }

                $sql = "CALL spGetAllActivities";
                $activityList = mysql_query($sql, $con);
                while ($row = mysql_fetch_assoc($activityList)){
                        echo "<option value='" . $row["activityID"] . "'>" . $row["activityDescription"] . "</option>";
                }
                mysql_close($con);
            }
        ?>


        <meta charset="utf-8" />
        <title>Enter time for <?php echo $login_name ?></title>
    </head>
    <body>
        <form action="postTime.php" method="POST">
            <fieldset>
                <legend>Time record for <?php echo $firstName,  ' ',  $lastName ?></legend>
                <label>Activity</label>
                <select name="activity">
                    <?php populateSelect(); ?>
                </select>
                <label>Start Time: </label>
                <input type="time" name="startTime">
                <label>End Time: </label>
                <input type="time" name="endTime">
                <input type="hidden" name="uid" value="<?php echo $uid ?>">
            </fieldset>
            <button type="submit">Post Time</button>
        </form>
    </body>
</html>
