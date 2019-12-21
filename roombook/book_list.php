<!DOCTYPE html>
<?php
require 'mysql/config.php';
$stdate = (isset($_GET['stdate'])) ? $_GET['stdate'] : date("Y-m-d");
$eddate = (isset($_GET['eddate'])) ? $_GET['eddate'] : date("Y-m-d");
if (isset($_GET['rmid'])) {
    $rmid = $_GET['rmid'];
    $bkin = $_GET['bkin'];
    $bkstatus = $_GET['bkstatus'];
    require 'book_status.php';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="book_list.php" method="GET">
            <label>Check in</label>
            <input type="date" name="stdate" value="<?php echo $nowdate; ?>" required/>
            <label>Check out</label>
            <input type="date" name="eddate" value="<?php echo $nowdate; ?>" required/>
            <button type="submit"/>Search</button>
        <a href="book_list.php">To day</a>
        <a href="book_range.php">Book</a>
    </form>
    <table border="1" cellspacing="1" cellpadding="2">
        <thead>
            <tr>
                <th>Manage</th>
                <th>Number Room</th>
                <th>Type</th>
                <th>Check in</th>
                <th>Cheek out</th>
                <th>Days</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM book"
                    . "LEFT JOIN rooms ON book.rmtype = rooms.rmtype"
                    . "LEFT JOIN roomtype ON rooms.rmtype = roomstype.rmtype"
                    . "WHERE book.bkin BETWEEN '$stdate' AND '$endate' AND book.bkstatus='1'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $day = (int) date_diff(date_create($row['bkin']), date_create($row['bkout']))->format('%R%a');
                ?>
                <tr>
                    <td>
                        <a href="javascript:bookstatus('<?php echo $row['rmid']; ?>','<?php echo $row['bkin']; ?>','0')">Cancel</a>
                        <a href="javascript:bookstatus('<?php echo $row['rmid']; ?>','<?php echo $row['bkin']; ?>','2')">Check in</a>

                    </td>
                    <td><?php echo $row['rmid']; ?></td>
                    <td><?php echo $row['tpname']; ?></td>
                    <td><?php echo date_format(date_create($row['bkin']), "d/m/Y"); ?></td>
                    <td><?php echo date_format(date_create($row['bkout']), "d/m/Y"); ?></td>
                    <td align = "right"><?php echo $day; ?></td>
                    <td align = "right"><?php echo number_format($row['rmprice'] * $day, 0); ?></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
        var vurl = "book_list.php?stdate=<?php echo $stdate; ?>&endate=<?php echo $endate; ?>";
        function bookstatus(v1, v2, v3) {
            var v4 = vurl += "&rmid" += v1 + "&bkin=" + v2 + "&bkstatus" + v3;
                    window.loacation.replace(v4);
        }
    </script>
</body>
</html>
