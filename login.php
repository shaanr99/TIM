<?php
    session_start();
?>
    
<!DOCTYPE html>
<html>
    <head>
        <title>Time in Motion</title>
        <!-- Core CSS - Include with every page -->
        <link href="bs-siminta-admin/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/css/style.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/css/main-style.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                  <img src="images/channelramp_logo.png" alt=""/>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">                  
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form action="timSplash.php" role="form" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="uname" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="upwd" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                                </fieldset>
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
        <script src="bs-siminta-admin/assets/scripts/siminta.js"></script>
    </body>

</html>
