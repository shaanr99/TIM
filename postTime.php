<?php
    $userID = $_POST["uid"];
    $activityID = $_POST["activity"];
    $stime = $_POST["startTime"];
    $etime = $_POST["endTime"];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Post Time Success</title>
    </head>
    <body>
        <p>UserID:  <?php echo $userID; ?></p>
        <p>ActivityID: <?php echo $activityID; ?></p>
        <p>Duration: <?php echo $stime . " - " . $etime ?> </p>
    </body>
</html>
