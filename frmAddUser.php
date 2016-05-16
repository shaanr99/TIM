<?php
            $username = $_POST["txtUserName"];
            $fname = $_POST["txtFirstName"];
            $lname = $_POST["txtLastName"];
            $pwd = $_POST["pwdPassword"];
            $role = $_POST["selRoles"];
    
            // establish connection
            $configData = parse_ini_file("config.ini");
            $con = mysql_connect($configData['host'],$configData['user'], $configData['pwd']);
            mysql_selectdb($configData['dbname'],$con);
            if (!$con)
            {
                printf('Could not connect' . mysql_error());
            }
            
            
            $sql = "CALL spAddNewUser('$fname','$lname','$username','$pwd', '$role')";
            mysql_query($sql, $con);
            //$num_rows = mysql_num_rows($results);
            //echo "$num_rows Rows found\n";

            if (mysql_error($con)){
                printf('Error adding user');
            }
            else {
                 printf('User Added');
            }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
