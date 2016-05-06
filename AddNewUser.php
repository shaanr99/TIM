
<?php 
    
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Add a User</title>
    </head>
    <body>
        <h1>Please fill in the information below to add a new user to the system.</h1>
        <section>
            <form method="post" action="frmAddUser.php" id="frmAddUser">
                <fieldset>
                    <legend>User Login Info</legend>
                    Username:  <input type="text" name="txtUserName" placeholder="Assign a username" required>
                    Password:  <input type="password" name="pwdPassword" placeholder="Password" required>
                    Verify Password:  <input type="password" name="pwdVerifyPassword" placeholder="Verify Password" required>
                    <button type="submit" id="btnVerifyUsername">Verify Username</button>
                </fieldset>
               </form>
        </section>
    </body>
</html>
