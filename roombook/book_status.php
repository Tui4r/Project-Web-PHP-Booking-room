<?php
$sql="UPDATE books SET bookstatus='$bkstatus'WHERE rmid ='$rmid' AND bkin='$bkin' AND bkstatus='1'";
$result=$conn->query($sql);
if($result==1){
  $msg="Success";
}else {
  $msg="Fail";
}
?>
<script>
 alert('<?php echo $msg;?>');
</script>
