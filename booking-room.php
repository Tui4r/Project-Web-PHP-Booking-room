<script src="alert/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="alert/dist/sweetalert.css">

<?php
include 'DB/config.php';


$room_num = $_POST['room'];
$room_date_booking = $_POST['date'];
$cus_name = $_POST['name'];
$cus_email = $_POST['email'];
$cus_tel = $_POST['tel'];
$add_date = $_POST['date'];

$sql = "INSERT INTO room_booking (room_num,room_date_booking,cus_name,cus_email,cus_tel,add_date)
                                VALUES('$room_num','$room_date_booking','$cus_name','$cus_email','$cus_tel','$add_date')";

$result = mysqli_query($conn,$sql);

if (mysqli_affected_rows($conn)>0) {
    header("Location: chk.php");
} else {
    header('Content-Type: application/json');
    $errors = "เกิดข้อผิดพลาด หรือ รหัส ซ้ำ กรุณาเปลี่ยนใหม่" . mysqli_error($conn);
    echo json_encode(array('status' => 'danger','message' => $errors));
}
?>
<script type="text/javascript">
        function JSalert(){
            swal("Congrats!", ", Your account is created!", "success");
        }
</script>