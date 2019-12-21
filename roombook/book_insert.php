<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
--><?php
require 'mysql/config.php';
$bkin = $_POST['bkin'];
$bkout = $_POST['bkout'];
$bkcust = $_POST['bkcust'];
$bktel = $_POST['bktel'];
if (isset($_POST['rmid'])) {
    $rmid = $_post['rmid'];
    $sql = "SELECT COUNT(rmid) AS countid FROM book "
            . "WHERE rmid = 'rmid' AND bkstaturs = '1'"
            . "AND ((bkin >= 'bkin' AND bkin < '$bkout')"
            . "OR(bkin <'$bkin' AND bkout > '$bkin'))";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $countid = (int) $row['countid'];
    if ($countid < 1) {
        $sql = "INSERT INTO `book`(`bkdate`, `rmid`, `bkin`, `bkout`, `bkcust`, `bktel`, `bkstatus`) "
                . "VALUES (NOW(),$rmid,$bkin,$bkout,$bkcust,$bktel,'1')";
        $result = $conn->query($sql);
        $v1 = ($result == 1) ? 1 : 0;
    } else {
        $v1 = 0;
    }
} else {
    $v1 = 0;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Booking</title>
    </head>
    <body>
        <script>
            var v1 = <?php echo $v1; ?>
            var vurl = "book_form.php?bkin=<?php echo $bkin; ?>";
            vurl += "&bkout=<?php echo $bkout; ?>";
            vurl += "&bkcust=<?php echo $bkcust; ?>";
            vurl += "&bktel=<?php echo $bktel; ?>";
            if (v1 == 1) {
                alert("Success");
            } else {
                alert("Unccess");
            }
            window.location.repalce(vurl);
        </script>
    </body>
</html>
