<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            $login_name = $_POST["uname"];
            $login_pwd = $_POST["upwd"];
    

            $con = mysqli_connect("localhost","shaanr", "T3stpil0t","tim");
            if (!$con)
            {
                printf('Could not connect' . mysql_error());
            }
            $database = $con->query('SELECT database() as dbname');
            $name = $database->fetch_assoc();
            $sql = "SELECT DISTINCT userID, firstName, lastName FROM Users WHERE userName = '$login_name' AND userPassword = '$login_pwd'";
            $results = $con->query($sql);
            if ($results->num_rows > 0){
                while ($row = $results->fetch_assoc()){
                    $uid = $row["userID"];
                }
            }
            else {
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
        <form action="postTime.php" method="POST">
            <fieldset>
                <legend>Time record</legend>
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
