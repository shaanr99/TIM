<?php
            $username = $_POST["txtUserName"];
    

            $con = mysql_connect("localhost","shaanr", "T3stpil0t");
            mysql_select_db("tim", $con);
            
            if (!$con)
            {
                printf('Could not connect' . mysql_error());
            }
            $sql = "CALL spCheckUsernameExists('$username')";
            $results = mysql_query($sql, $con);
            $num_rows = mysql_num_rows($results);
            echo "$num_rows Rows found\n";

            if (mysql_num_rows($results)>0){
                printf('Username already exists.');
            }
            else {
                 printf('Good to go.');
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
