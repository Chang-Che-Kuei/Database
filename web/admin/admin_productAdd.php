<?php
	require_once '../Connections/db.php';
	
	$temp = substr(md5(time()),0,14).".";
	$ext = end(explode('.', $_FILES['p_pic']['name']));
	$filename = $temp.$ext ;
	$sqlfilename='images/shop/'.$filename ;
	$r = '../images/shop/' .$filename;
	$upload_dir= '../images/shop/';
	if (move_uploaded_file($_FILES['p_pic']['tmp_name'],$r)) // 搬移上傳檔案
	{echo "File is valid, and was successfully uploaded.\\\\n";} 
	else {echo "Possible file upload attack!\\\\n";}  
	
	$r1="INSERT INTO `product` (`product_ID`, `name`, `price`, `description`, `picture`, `stock`, `category`, `sale_number`) VALUES (NULL, '{$_POST['p_name']}', '{$_POST['p_price']}', '{$_POST['p_content']}', '{$sqlfilename}','{$_POST['stock']}' , '{$_GET['shop_id']}', '0');";
	$result = mysqli_query($_SESSION['link'], $r1);
	$url="admin_shop2.php?shop_id=".$_GET[shop_id];
	header("Location:$url" );
?>