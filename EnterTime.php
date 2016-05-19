<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Core CSS - Include with every page -->
        <link href="overridestyle.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/css/style.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/css/main-style.css" rel="stylesheet" />
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
        <script>
            var interval = setInterval(start, 1000);
            var output;
            
            function init(){
                document.getElementById("startTime").value = (new Date()).toLocaleString(); //.split(' ')[0];
            }
            
            function start(){
                d = new Date();
                document.getElementById("output").innerHTML = d.toLocaleTimeString();
            } // end init
             
            function stop(){
                document.getElementById("endTime").value = (new Date()).toLocaleString(); //.split(' ')[0];
                clearInterval(interval);
            } // stop timer
             
        </script>
        <link rel="stylesheet" type="text/css" href="mainstyle.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="nav" id="customNav"></div>
                <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                  <img src="images/channelramp_logo.png" alt=""/>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">                  
                        <div class="panel-heading">
                            <h3 class="panel-title">Time record for <?php echo $firstName,  ' ',  $lastName ?></h3>
                        </div>
                        <div class="panel-body">
                            <!-- form goes here -->
                            <form action="postTime.php" method="POST">
                                <table class="table">
                                    <tr>
                                        <td><label> Current Time:  </label></td>
                                        <td><div id="output">empty</div></td>
                                    </tr>
                                    <tr>
                                        <td><label>Activity</label></td>
                                        <td><select name="activity">
                                            <?php populateSelect(); ?>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td><label>Start Time: </label></td>
                                        <td><input id="startTime" type="datetime" step="1" name="startTime"></td>
                                    </tr>
                                    <tr>
                                        <td><label>End Time: </label></td>
                                        <td><input id="endTime" type="datetime" step="1" name="endTime"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: center">
                                            <button type="button" class="btn btn-success btn-circle btn-lg text-center" onclick="init()"><i>Start</i></button>
                                            <button type="button" class="btn btn-danger btn-circle btn-lg" onclick="stop()"><i>Stop</i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: center">
                                            <button type="submit" class="btn btn-warning">Post Time</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: center">
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </td>
                                    </tr>
                                </table>
                                <input type="hidden" name="uid" value="<?php echo $uid ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Core Scripts - Include with every page -->
        <script src="bs-siminta-admin/assets/plugins/jquery-1.10.2.js"></script>
        <script src="bs-siminta-admin/assets/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="bs-siminta-admin/assets/plugins/metisMenu/jquery.metisMenu.js"></script>
        
        <script src="menu_load.js"></script>
        

    </body>
</html>
