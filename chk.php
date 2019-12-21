<?php
include ('DB/config.php');
include ('auth.php');
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
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true              //Set เป็นปี พ.ศ.
            }).datepicker("setDate", "0");  //กำหนดเป็นวันปัจุบัน
        });
    </script>
</head>

<div class="container align-center">
    <br><h1>Checking Rooms</h1><br>
    <form class="align-content-center" action="show-booking.php" method="post" name="form1">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Since</label>
                <input type="date" class="form-control is-valid" id="inputEmail4" placeholder="date" name="startDate" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">To</label>
                <input type="date" class="form-control is-valid" id="inputEmail4" placeholder="Date" name="endDate" required>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-danger">Search</button>

        <a href="index.php" ><button type="button" class="btn btn-outline-info"><i class="fa fa-home"></i> Home</button></a>
    </form>

</div>
