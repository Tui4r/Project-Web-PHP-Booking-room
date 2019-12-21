<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php $nowdate = date("Y-m-d"); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="book_form.php" method="GET">
            <label>Check in</label>
            <input type="date" name="bkin" value="<?php echo $nowdate; ?>" required/>
            <label>Check out</label>
            <input type="date" name="bkout" value="<?php echo $nowdate; ?>" required/>
            <button type="submit"/>GO</button>
        <a href="book_list.php">Home</a>
    </form>
</body>
</html>
