<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <!-- Core CSS - Include with every page -->
        <link href="overridestyle.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/css/style.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/css/main-style.css" rel="stylesheet" />        
        <title>Add a User</title>
        <?php
            // Get a list of roles that the user can select from
            function populateSelect()
            {
                $configData = parse_ini_file("config.ini");
                $con = mysql_connect($configData['host'],$configData['user'], $configData['pwd']);
                mysql_selectdb($configData['dbname'],$con);
                
                if (!$con)
                {
                    printf('Could not connect' . mysql_error());
                }

                $sql = "CALL spGetAllRoles";
                $roleList = mysql_query($sql, $con);
                while ($row = mysql_fetch_assoc($roleList)){
                        echo "<option value='" . $row["roleID"] . "'>" . $row["roleName"] . "</option>";
                }
                mysql_close($con);
            }
        
        ?>
        <script src="addUser.js"></script>
    </head>
    <body>
        <div class=" ">
           <img src="images/channelramp_logo.png" alt=""/>
        </div>
        <div style="padding:10px; margin: 10px;">
            <p class="lead">Please fill in the information below to add a new user to the system.</p>
    
            <form method="post" action="frmAddUser.php" id="frmAddUser">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <label>Login Information</label>
                            </h4>
                        </div>
                        <div id="collapseOne">
                            <table class="form-input">
                                <tr>
                                    <td><label>Username:</label></td>
                                    <td><input type="text" id="txtUserName" name="txtUserName" placeholder="Assign a username" required></td>
                                </tr>
                                <tr>
                                        <td><label>Password:</label></td>
                                        <td><input type="password" name="pwdPassword" placeholder="Password" required></td>
                                </tr>
                                <tr>
                                    <td><label>Verify Password:</label></td>
                                    <td><input type="password" name="pwdVerifyPassword" placeholder="Verify Password" required></td>
                                </tr>
                                <tr>
                                    <td><button class="btn btn-success btn-choicelist" type="button" id="btnVerifyUsername" onclick="validateUsername(document.getElementById('txtUserName').value);">Verify Username</button></td>
                                    <td><label class="error" id="txtError" value=""></label></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <label>User Information</label>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="">
                            <table class="form-input">
                                <tr>
                                    <td><label>First Name:</label></td>
                                    <td><input type="text" id="txtFirstName" name="txtFirstName" placeholder="First name" required></td>
                                </tr>
                                <tr>
                                    <td><label>Last Name:</label></td>
                                    <td><input type="text" id="txtLastName" name="txtLastName" placeholder="Last name" required></td>
                                </tr>
                                <tr>
                                    <td><label>Organizational Role:</label></td>
                                    <td><select id="selRoles" name="selRoles" required><?php populateSelect(); ?></select></td>
                                </tr>
                            </table>
                    </div>
                </div>
                <button class="btn btn-primary btn-choicelist" type="submit">Add this user</button>
               </form>
                </div>
        <!-- Core Scripts - Include with every page -->
        <script src="bs-siminta-admin/assets/plugins/jquery-1.10.2.js"></script>
        <script src="bs-siminta-admin/assets/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="bs-siminta-admin/assets/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="bs-siminta-admin/assets/scripts/siminta.js"></script>

    </body>
</html>
