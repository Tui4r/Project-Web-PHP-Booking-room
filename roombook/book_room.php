<<?php
$sql = "SELECT * FROM book"
        . "LEFT JOIN rooms ON books.rmtype = rooms.rmtype"
        . "LEFT JOIN roomtype ON rooms.rmtype = roomstype.rmtype"
        . "WHERE book.bkin = '$bkin' AND book.bktel ='$bktel' AND book.bkstatus='1'";
$result = $conn->query($sql);
?>
<table border="1" cellspacing="0" cellpadding="2">
    <thead>
        <tr>
            <th>Cancel</th>
            <th>Room Number</th>
            <th>Type</th>
            <th>Check in</th>
            <th>Checkout</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><a href="javascript:bookcancel('<?php echo $row['rmid']; ?>');"></a></td>
                <td><?php echo $row['rmid']; ?></td>
                <td><?php echo $row['tpname']; ?></td>
                <td><?php echo date_format(date_create($row['bkin']), "d/m/Y"); ?></td>
                <td><?php echo date_format(date_create($row['bkout']), "d/m/Y"); ?></td>
                <td align = "right"><?php echo number_format($row['rmprice'],0); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
        function bookcancel(v1) {
            window.location.href = "book_form.php?bkin=<?php echo bkin; ?>&bkout=<?php echo bkout; ?>&bkcust=<?php echo bkcust; ?>&bktel=<?php echo bktel; ?>&rmid=" + v1;

    }
</script>

