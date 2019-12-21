<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'mysql/config.php';
$bkin = (isset($_GET['bkin'])) ? $_GET['bkin'] : date("Y-m-d");
$bkout = (isset($_GET['bkout'])) ? $_GET['bkout'] : date("Y-m-d");
$bkcust = (isset($_GET['bkcust'])) ? $_GET['bkcust'] : "";
$bktel = (isset($_GET['bktel'])) ? $_GET['bktel'] : "";
$q = (int) (isset($_GET['q'])) ? $_GET['q'] : 0;
if (isset($_GET['rmid'])) {
    $rmid = $_GET['rmid'];
    $bkstatus = 0;
    require 'book_status.php';
}
$day = (int) date_diff(date_create($bkin), date_create($bkout))->format('%R%a');
if ($day < 1) {
    echo "<script>window.location.replace('book)range.php');</script>";
    exit();
}
if ($q > 0) {
    $kw = "AND roomtype.rmtype='$q'";
} else {
    $kw = "";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Booking</title>
    </head>
    <body>
        <form action="book_form.php"  method="GET">
            <label>Check in</label>
            <input type="date" name="bkin" value="<?php echo $bkin; ?>" readonly=""/>
            <label>Check out</label>
            <input type="date" name="bkout" value="<?php echo $bkout; ?>" readonly=""/>
            <input type="hidden" name="bkcust" value="<?php echo $bkcust; ?>" />
            <input type="hidden" name="bktel" value="<?php echo $bktel; ?>" />
            <select name="q" id='q'>
                <option value="0">ALL</option>
                <?php
                $sql = "SELECT * FROM roomtype ORDER NY rmtype ASC";
                $result = $conn->query($sql);
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    ?>
                    <option value="<?php echo $row['rmtype']; ?>">
                        <?php echo $row['tpname']; ?></option> 
                    <?php } ?>
                </select>
                <button type="submit">Search</button>
            </form><br>
            <form action="book_insert.php" method="POST">
                <label>Check in</label>
                <input type="date" name="bkin" value="<?php echo $bkin; ?>" />
                <label>Check out</label>
                <input type="date" name="bkout" value="<?php echo $bkout; ?>" />
                <label>Name </label>
                <input type="text" name="bkcust" value="<?php echo $bkcust; ?>"required/><br>
                <label>Tel. </label>
                <input type="text" name="bktel" value="<?php echo $bktel; ?>" required/><br>
                <label>Choose Rooms : </label>
                <select name="rmid" size="10" required>

                    <?php
                    $sql = "SELECT * FROM rooms LETT JOIN roomtype ON rooms.rmtype = roomtype.rmtype"
                            . "WHERE emid NOT IN(SELECT rmid FORM book WHERE bkstaturs = '1'"
                            . "AND ((bkin >= 'bkin' AND bkin < '$bkout') "
                            . "OR(bkin <'$bkin' AND bkout > '$bkin')))" . $kw;

                    $result = $conn->query($sql);
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        ?>
                        <option value="<?php echo $row['rmid']; ?>">
                            <?php echo $row['rmid']; ?>&nbsp;
                            <?php echo $row['tpname']; ?>&nbsp;
                            <?php echo $row['rmprice']; ?>
                        </option>
                        <?php } ?>
                </select><br>
                <button type="submit">Search</button>
                </form>
            <?php require 'book_room.php';?><br>
            <a href="book_list.php">Home</a>
                <script>
                    document.getElementById('q').value = "<?php echo $q; ?>";
        </script>
    </body>
</html>
