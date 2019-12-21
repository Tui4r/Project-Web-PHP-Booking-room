<?php
include ('DB/config.php');
include 'auth.php'
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checking Rooms</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
<div class="container">
    <form id="form1" name="form1" method="post" action="show-booking.php">
        <br>
        <h1>Checking Rooms</h1><br>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputAddress">Since</label>
                <?php echo $_POST['startDate']; ?>
            </div>
            <div class="form-group col-md-4">
                <label for="inputAddress">To</label>
                <?php echo $_POST['endDate']; ?>
            </div>
            <a href='chk.php'><button type="button" class="btn btn-outline-dark" ><i type="fa-font-awesome" class="fa fa-arrow-circle-left"></i>  Back</button></a>
            <a href='index.php'><button type="button" class="btn btn-outline-info"><i type="fa-font-awesome" class="fa fa-home"></i>   Home</button></a>

            <?php
            $booking = array();
            $date = array();
            $room = array(1,2,3,4,5);
            $startDate = mysqli_real_escape_string($conn,$_POST['startDate']);
            $endDate = mysqli_real_escape_string($conn,$_POST['endDate']);
            $sql = "SELECT * FROM `room_booking` WHERE `room_date_booking` >= '{$startDate}' AND `room_date_booking` <= '{$endDate}' ";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result))
            {
                $booking[$row['room_num']][] = $row['room_date_booking']; //$booking[1][0] = '2019-12-01';
            }
            $objStartDate = date_create($startDate);
            $objEndDate = date_create($endDate);
            $diff = date_diff($objStartDate,$objEndDate);
            $diffDays = $diff -> days;
            $tb = '<table class="table table-bordered"><tr><th class="bg-info">Rooms / Date </th>';
            for($i=0;$i <=$diffDays;$i++){
                $date[$i] = date_format($objStartDate,'Y-m-d');
                $tb.='<th class="bg-warning"><div class="container" align="center">'.$date[$i].'</div> </th>';
                date_add($objStartDate,date_interval_create_from_date_string('1 days'));
            }
            $tb.='</tr>';
            foreach ($room as $r){
                $tb.='<tr><td>'.$r.'</td>';
                foreach ($date as $d){
                    if (isset($booking[$r])&&in_array($d,$booking[$r])){
                        $tb.='<td class="bg-danger"><div class="container" align="center">No Vacancy</div></td> ';
                    }else{
                        $tb.='<td class="bg-success"><div class="container" align="center"><a href="booking.php?r='.$r.'&d='.$d.'">Vacancy</a></div></td>';
                    }
                }
                $tb.='</tr>';
            }
            $tb.='</table>';
            echo $tb;
            ?>
        </div>

    </form>
</div>
</body>
</html>
