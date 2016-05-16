<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
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
        <h1>Please fill in the information below to add a new user to the system.</h1>
        <section>
            <form method="post" action="frmAddUser.php" id="frmAddUser">
                <fieldset>
                    <legend>User Login Information</legend>
                    Username:  <input type="text" id="txtUserName" name="txtUserName" placeholder="Assign a username" required><br>
                    Password:  <input type="password" name="pwdPassword" placeholder="Password" required><br>
                    Verify Password:  <input type="password" name="pwdVerifyPassword" placeholder="Verify Password" required><br>
                    <button type="button" id="btnVerifyUsername" onclick="validateUsername(document.getElementById('txtUserName').value);">Verify Username</button>
                    <label class="error" id="txtError" value=""></label>
                </fieldset>
                <fieldset>
                    <legend>Basic User Information</legend>
                    First Name: <input type="text" id="txtFirstName" name="txtFirstName" placeholder="First name"><br>
                    Last Name:  <input type="text" id="txtLastName" name="txtLastName" placeholder="Last name">
                    Organizational Role:  <select id="selRoles" name="selRoles">
                        <?php populateSelect(); ?>
                    </select>
                </fieldset>
                <button type="submit">Add this user</button>
               </form>
        </section>
    </body>
</html>
