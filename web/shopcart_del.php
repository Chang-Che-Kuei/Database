<?php 
require_once "Connections/db.php";
		$t_id=$_GET[transaction_id];
	$dele="DELETE FROM `record` ";
	$result=mysqli_query($_SESSION['link'],$dele);
	
	$dele="DELETE FROM `transaction` WHERE `transaction_id`= '$t_id' ";
	$result=mysqli_query($_SESSION['link'],$dele);
	echo $t_id;
echo"<script>alert('移除成功');history.go(-1);</script>"; 
		
		
		
?>