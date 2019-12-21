<?php
require('DB/config.php');
session_start();
if (isset($_POST['username'])) {
    $username = stripcslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripcslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    $quey = "SELECT * FROM users WHERE username = '$username' AND password = '" . md5($password) . "'";

    $result = mysqli_query($conn, $quey) or die (mysqli_error());
    $row = mysqli_num_rows($result);

    if ($row == 1) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
    } else {
        echo "<script>alert('Login Fail.')</script>";
        header('Location: login.php');
    }
} else {
    ?>
<?php } ?>