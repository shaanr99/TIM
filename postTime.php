<?php
    $ESTTZ = new DateTimeZone('America/New_York');

    $userID = $_POST["uid"];
    $activityID = $_POST["activity"];
    $stime = $_POST["startTime"];
    $etime = $_POST["endTime"];
    
    // establish connection
    $configData = parse_ini_file("config.ini");
    $con = mysql_connect($configData['host'],$configData['user'], $configData['pwd']);
    mysql_selectdb($configData['dbname'],$con);

    // set the timezone - dumb-da-dumb-dumb ...
    $ESTTZ = new DateTimeZone($configData['timezone']);
    date_default_timezone_set($configData['timezone']);
    
    // convert the dates into a format that can be entered
    // as a datetime data type
    $tmpTime = date_create_from_format('m/d/Y, h:i:s A',$stime);
    $stime_formatted = date_format($tmpTime, 'Y-m-d H:i:s');
    
    $tmpTime = date_create_from_format('m/d/Y, h:i:s A',$etime);
    $etime_formatted = date_format($tmpTime, 'Y-m-d H:i:s');

    $sql = "CALL spInsertTimeRecord($userID, '$stime_formatted', '$etime_formatted', $activityID)";
    $results = mysql_query($sql, $con);
    if (mysql_error($con)){
        echo "Error inserting record " . mysql_error($con);
    }
    else {
        echo "Data Entered.";
    }
    
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
