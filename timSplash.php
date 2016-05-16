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
            <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="text-align: center;">
                        Please select from an option below
                    </div>
                    <div class="panel-body" style="text-align: center;">
                        <p><button class="btn btn-primary btn-choicelist" type="button" id="btnAddUser" value="Add New User" onclick="processClick('AddNewUser.php');">Add New User</button></p>
                        <p><button class="btn btn-success btn-choicelist" type="button" id="btnModifyUser" value="Change User Attributes" onclick="processClick('ModifyUser.php');">Change User Attributes</button></p>
                        <p><button class="btn btn-info btn-choicelist" type="button" id="btnEnterTime" value="Enter time" onclick="processClick('EnterTime.php');">Enter Time</button></p>
                        <p><button class="btn btn-warning btn-choicelist" type="button" id="btnReports" value="View Reports" onclick="processClick('Reports.php');">View Reports</button></p>
                        <input type="hidden" name="uid" value="<?php echo $uid ?>">
                        <input type="hidden" name="uname" value="<?php echo $login_name ?>">
                        <input type="hidden" name="upwd" value="<?php echo $login_pwd ?>">
                    </div>
                </div>
            </div>
       </form>
        <!-- Core Scripts - Include with every page -->
        <script src="bs-siminta-admin/assets/plugins/jquery-1.10.2.js"></script>
        <script src="bs-siminta-admin/assets/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="bs-siminta-admin/assets/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="bs-siminta-admin/assets/plugins/pace/pace.js"></script>
        <script src="bs-siminta-admin/assets/scripts/siminta.js"></script>
    </body>
</html>
