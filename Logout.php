<?php
    session_start();
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Logout</title>
        <!-- Core CSS - Include with every page -->
        <link href="overridestyle.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/css/style.css" rel="stylesheet" />
        <link href="bs-siminta-admin/assets/css/main-style.css" rel="stylesheet" />
    </head>
    <body>
        <div class="nav" id="customNav"></div>
            <div class=" col-lg-12 text-center">
                <div class="panel-body green">
                    <div class="panel-header">
                        You have successfully logged out.<i class="fa fa-thumbs-up"></i>
                    </div>
                </div>
            </div>

        <script src="menu_load.js"></script>
    </body>
</html>