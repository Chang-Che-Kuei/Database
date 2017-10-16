<?php
require_once "Connections/db.php";
$t_id=$_GET[transaction_id];
$del="DELETE FROM `transaction` WHERE `transaction_ID`='$t_id'";
$result=mysqli_query($_SESSION['link'],$del);
echo"<script>alert('刪除成功');history.go(-1);</script>"; 
?>