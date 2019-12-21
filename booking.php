<?php
include ('DB/config.php');
include 'auth.php';
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Booking</title>
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

<body>
<div class="container align-center">
    <br><h1>Booking</h1><br>
<form class="align-content-center" action="booking-room.php" method="post" name="form1">
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="inputEmail4">Room Number</label>
            <input type="text" class="form-control is-valid" id="inputEmail4" placeholder="date" name="room" value="<?php echo $_GET['r'];?>" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="inputEmail4">Date Reserve</label>
            <input type="text" class="form-control is-valid" id="inputEmail4" placeholder="Date" name="date" value="<?php echo $_GET['d'];?>" readonly>
        </div>
    </div>
    <div class="form-row">
        <br>
        <div class="col-md-4">
            <label for="inputEmail4">Your Name</label>
            <input type="text" class="form-control is-valid" placeholder="First name" name="name" required>
        </div>
    </div><br>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputAddress">E-mail</label>
            <input type="text" class="form-control is-valid" id="inputEmail4" placeholder="E-mail" name="email" required>
            <br>
            <label for="inputAddress">Tel.</label>
            <input type="text" class="form-control is-valid" id="inputEmail4" placeholder="Tel." name="tel" required>
        </div>
    </div>

    <div class="align-center">
        <a href='chk.php'><button type="button" class="btn btn-outline-primary"><i type="fa-font-awesome" class="fa fa-arrow-circle-left"></i>   Back</button></a>
        <button type="submit" class="btn btn-outline-warning"OnClick="chkConfirm()"><i type="fa font-awesome" class="fa fa-resistance" ></i>Reserve</button>
        <a href='index.php'><button type="button" class="btn btn-outline-info"><i type="fa-font-awesome" class="fa fa-home"></i>   Home</button></a>

    </div>

    </form>
    <script language="JavaScript">
        function chkConfirm()
        {
            if(confirm('Do you want to Confirm Reserve')==true)
            {
                window.location.replace('chk.php');
            }
            else
            {
                alert('Cancel.');
            }
        }
    </script>
 <!--   <script language="javascript">
        function checkvalidate()
        {
            if (document.form1.name.value == ""){
                alert('Please in put your name');
                document.form1.name.focus();
                return false;
            }
            if (document.form1.email.value == ''){
                alert('Please in put your E-mail.')
                document.form1.email.focus();
                return false;
            }
            if (document.form1.tel.value == ""){
                alert('Please in put your Phone number.');
                document.form1.tel.focus();
                return false;
            }
            document.form1.submit();
        }
    </script> -->


</div>
</body>
</html>