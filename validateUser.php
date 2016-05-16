<?php
            $username = $_GET["txtUserName"];
    
            // establish connection
            $configData = parse_ini_file("config.ini");
            $con = mysql_connect($configData['host'],$configData['user'], $configData['pwd']);
            mysql_selectdb($configData['dbname'],$con);
            if (!$con)
            {
                printf('Could not connect' . mysql_error());
            }
            
            
            $sql = "CALL spCheckUsernameExists('$username')";
            $results = mysql_query($sql, $con);
            $num_rows = mysql_num_rows($results);

            if (mysql_num_rows($results)>0){
                printf('Username already exists.');
            }
            else {
                 printf('&#9989;');
            }
?>