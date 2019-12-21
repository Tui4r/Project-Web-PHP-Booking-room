<?php
require ('DB/config.php');

if (isset($_REQUEST['username'])){
    $username = stripcslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn,$username);
    $password = stripcslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);
    $email = stripcslashes($_REQUEST['mail']);
    $email = mysqli_real_escape_string($conn,$email);
    $trn_date = date('Y-m-d H:i:s');

    $query = "INSERT INTO users (username,password,email,trn_date)
                VALUES ('$username','".md5($password)."','$email','$trn_date')";

$result = mysqli_query($conn , $query);

if($result){
    echo "<script>

alert('Success')
</script>";
    header('Location: login.php');
}
else {

}

}