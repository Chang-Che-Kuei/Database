<?php 
require_once "Connections/db.php";
		$t_id=$_GET[transaction_id];
		$p_id=$_GET[product_id];
		$dele="DELETE FROM `record` WHERE `transaction_id` = '$t_id' AND `product_id` = '$p_id' ";
		$result=mysqli_query($_SESSION['link'],$dele);
		
echo"<script>alert('移除成功');history.go(-1);</script>"; 
		
		
		
?>