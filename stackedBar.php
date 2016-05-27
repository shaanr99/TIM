<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>
    <title>Page Title</title>
    <!-- Core CSS - Include with every page -->
    <link href="bs-siminta-admin/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="bs-siminta-admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="bs-siminta-admin/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="bs-siminta-admin/assets/css/style.css" rel="stylesheet" />
    <link href="bs-siminta-admin/assets/css/main-style.css" rel="stylesheet" />

    <script src="./js/Chart.js"></script>
    
    <?php
        $chartTitle = "Work in Seconds";
        // establish connection
        $configData = parse_ini_file("config.ini");
        $con = mysql_connect($configData['host'],$configData['user'], $configData['pwd']);
        mysql_selectdb($configData['dbname'],$con);
        // populate the labels
        $sql = "SELECT activityID, activityDescription FROM Activity";
        $results = mysql_query($sql, $con);
        $num_rows = mysql_num_rows($results);
        if ($num_rows > 0){
            
            $labelArray = mysql_fetch_array($results);
        
        }
        
        // populate the data
        $sql = "SELECT * FROM selectTimesByActivity GROUP BY activityID ORDER BY activityID ";
        $results = mysql_query($sql, $con);
        $num_rows = mysql_num_rows($results);
        if ($num_rows > 0){
            // there is data ...
            while ($row = mysql_fetch_assoc($results)){
                $data[] = $row['duration'];
                $label[] = $row['activityDescription'];
            }    
        }

    ?>
</head>

<body>
    <div class="nav" id="customNav"></div>

    <canvas id="myChart" width="400" height="400"></canvas>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($label) ?>,
                datasets: [{
                    label: "<?php echo $chartTitle ?>",
                    data: <?php echo json_encode($data) ?>
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
</script>
    <!-- Core Scripts - Include with every page -->
    <script src="bs-siminta-admin/assets/plugins/jquery-1.10.2.js"></script>
    <script src="bs-siminta-admin/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="bs-siminta-admin/assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="bs-siminta-admin/assets/scripts/siminta.js"></script>
    <script src="./js/menu_load.js"></script>
</body>
</html>
